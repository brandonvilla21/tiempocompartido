<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GuzzleHttp\Client;

class User extends Authenticatable
{
    use Notifiable;
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
     * URI: http://0.0.0.0:3000/api/Users 
     */
    public static function registerUser($client, $request)
    {
        return $client->request('POST', 'Users', [
            'form_params' => [
                'realm'         => $request->user,
                'username'      => $request->username,
                'email'         => $request->email,
                'password'      => $request->password,
                'emailVerified' => true
            ]
        ]);
    }

    /**
     * Logs a User by HTTP Request
     * Method: POST
     * URI: http://0.0.0.0:3000/api/Users/login
     */
    public static function logUser($client, $request)
    {
        return $client->request('POST', 'Users/login', [
            'form_params' => [
                'email'         => $request->email,
                'password'      => $request->password,
            ],
            'decode_content' => true,
            'header' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
    }
    /**
     * Temporal method
     * Get the token from body request
     */
    public static function getTokenFromString($body)
    {   
        $token='';
        for($i = 0; $i < strlen($body) -1; $i++) 
            if($body{$i} . $body{$i+1} == 'id') {
                $initPos = $i + 5;
                while(true) 
                    if($body{$initPos} == '"') break;
                    else {
                        $token = $token . $body{$initPos};                            
                        $initPos = $initPos +1;
                    } 
            } 
        return $token;
    }

    
}
