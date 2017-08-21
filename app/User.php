<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    /**
     * Register a new User by HTTP Request 
     * Method: POST
     * URI: http://0.0.0.0:3000/api/People 
     */
    public static function registerUser($client, $request)
    {
        return $client->request('POST', 'People', [
            'form_params' => [
                'nickname'      => $request->user,
                'email'         => $request->email,
                'password'      => $request->password,
                'emailVerified' => true
            ]
        ]);
    }

    /**
     * Logs a User by HTTP Request
     * Method: POST
     * URI: http://0.0.0.0:3000/api/People/login
     */
    public static function logUser($client, $request)
    {
        return $client->request('POST', 'People/login', [
            'form_params' => [
                'email'     => $request->email,
                'password'  => $request->password,
            ],
            'decode_content' => false,
            'headers' => [
                // 'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ]
        ]);

    }

    /**
     * Get User information by HTTP Request
     * Method: GET
     * URI: http://0.0.0.0:3000/api/People/{id}
     */
    public static function getUserInformation($client, $id, $ACCESS_TOKEN)
    {
        return $client->request('GET', 'People/'.$id, [
            'form_params' => [
                'id'  => $id,
            ],
            'decode_content' => true,
            'headers' => [
                'Authorization' => $ACCESS_TOKEN
            ]
        ]);
    }
    
    /**
     * Logs out a User by HTTP Request
     * Method: POST
     * URI: http://0.0.0.0:3000/api/People/logout
     */
    public static function logoutUser($client, $ACCESS_TOKEN)
    {
        return $client->request('POST', 'People/logout', [

            'headers' => [
                'Authorization' => $ACCESS_TOKEN
            ]
        ]);
    }  

    /**
     * Get all membresias from a single user information by HTTP Request
     * Method: GET
     * URI: http://0.0.0.0:3000/api/People/{id}/membresias
     */
    public static function getUserMembresias($client, $ACCESS_TOKEN, $userId)
    {
        return $client->request('GET', 'People/'. $userId . '/membresias', [
            'headers' => [
                'Authorization' => $ACCESS_TOKEN,
                'Accept'        => 'application/json'
            ]
        ]);
    }

    /**
     * Modify a user information by HTTP Request
     * Method: PUT
     * URI: http://0.0.0.0:3000/api/People/{id}/
     */
    public static function edit($client, $request, $userId, $ACCESS_TOKEN)
    {
        return $client->request('PUT', 'People/'.$userId, [
             'form_params' => [
                  'name'            => $request->name,
                  'nickname'        => $request->nickname,
                  'email'           => $request->email,
                  'ciudad'          => $request->ciudad,// Not required in HTML
                  'pais'            => $request->pais, // Not required in HTML
                  'lenguaje'        => $request->lenguaje,
                  'telefono'        => $request->telefono,// Not required in HTML
                  'destinosInteres' => $request->destinosInteres,// Not required in HTML
                  'informacion'     => $request->informacion,// Not required in HTML
                  'usuarioTipo'     => $request->usuarioTipo,
                  'datosVisibles'   => $request->datosVisibles,
                  'lenguaje'        => $request->lenguaje,
                  'password'        => $request->password,
                  'id'              => $userId,
            ],
            'headers' => [
                'Authorization' => $ACCESS_TOKEN
            ]
        ]);
    }

    /**
     * Change user password by HTTP Request
     * Method: POST 
     * URI: http://0.0.0.0:3000/api/People/change-password
     */
     public static function changePassword($client, $request, $userId, $ACCESS_TOKEN)
     {
        return $client->request('POST', 'People/change-password', [
            'form_params' => [
                'oldPassword' => $request->oldPassword,
                'newPassword' => $request->newPassword,
                'id'          => $userId
            ],
            'headers' => [
                'Authorization' => $ACCESS_TOKEN,
                'Content-Type'  => 'application/x-www-form-urlencoded'
            ]
        ]);
     }
    /**
     * Finds if its favorito by HTTP Request
     * Method: GET 
     * URI: http://0.0.0.0:3000/api/People/{id}/favoritos
     */
     public static function isFavorito($client, $membresiaId, $userId, $ACCESS_TOKEN)
     {
        $response = $client->request('GET', 'People/'.$userId.'/favoritos', [
            
            'headers' => [
                'Authorization' => $ACCESS_TOKEN,
                'Accept'  => 'application/json'
            ]
        ]);
        $favoritos = json_decode($response->getBody()->getContents());
        foreach ($favoritos as $favorito) {
            if ($favorito->idMembresia == $membresiaId) 
                return true;
        }
        return false;
     }
    /**
     * Finds all membresias favoritas related to a Person by HTTP Request
     * Method: GET 
     * URI: http://0.0.0.0:3000/api/People/{id}/favoritos
     */
     public static function getMembresiasFavoritas($client, $userId, $ACCESS_TOKEN)
     {

        $response =  $client->request('GET', 'People/'.$userId.'/favoritos', [
            
            'headers' => [
                'Authorization' => $ACCESS_TOKEN,
                'Accept'  => 'application/json'
            ]
        ]);
        $favoritos = json_decode($response->getBody()->getContents());
        $membresias = [];
        
        foreach ($favoritos as $key => $favorito) {
            $responseM = Membresia::findById($client, $favorito->idMembresia);
            $membresias[$key] = json_decode($responseM->getBody()->getContents());
        }

        return $membresias;
     }
    /**
     * Get all Images related to a Membresia by HTTP Request
     * and returns the first coincidence to the principal image
     * in case there's any principal images, it will return 
     * null
     *
     * Method: GET 
     * URI: http://0.0.0.0:3000/api/Membresia/{id}/imagenes
     */
     public static function getPrincipalImage($client, $membresiaId)
     {
         
        $response = $client->request('GET', 'Membresia/'. $membresiaId . '/imagenes', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        
        $images = json_decode($response->getBody()->getContents());

        foreach ($images as $image) 
            if($image->principal)
                return $image;
        

        return null;
     }
}
