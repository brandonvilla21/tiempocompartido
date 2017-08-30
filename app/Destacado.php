<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
    /**
     * Get all Destacados by HTTP Request 
     * Method: GET
     * URI: http://0.0.0.0:3000/api/Destacados
     */
     public static function getAll($client)
     {
        return $client->request('GET', 'Destacados', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
     }
}
