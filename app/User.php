<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GuzzleHttp\Client;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * Endpoint for API 
     * @var string
     */
    const BASE_URI = 'http://0.0.0.0:3000/api/';
        
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
     * Gets the instance to make HTTP Requests
     */
    public static function getClient()
    {
         $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => static::BASE_URI,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        return $client;
    }

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
    
    public static function logoutUser($client, $ACCESS_TOKEN)
    {
        return $client->request('POST', 'People/logout', [

            'headers' => [
                'Authorization' => $ACCESS_TOKEN
            ]
        ]);
    }  

    public static function getUserMembresias($client, $ACCESS_TOKEN, $userId)
    {
        return $client->request('GET', 'People/'. $userId . '/membresias', [
            'headers' => [
                'Authorization' => $ACCESS_TOKEN,
                'Accept'        => 'application/json'
            ]
        ]);
    }
}
