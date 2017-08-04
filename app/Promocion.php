<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    /**
     * Get all Promociones by HTTP Request 
     * Method: GET
     * URI: http://0.0.0.0:3000/api/promociones
     */
     public static function getAll($client)
     {
        return $client->request('GET', 'promociones', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
     }

     /**
     * Get a single Promocion by HTTP Request 
     * Method: GET
     * URI: http://0.0.0.0:3000/api/promociones/{id}
     */
     public static function findById($client, $idPromocion)
     {
         return $client->request('GET', 'promociones/'. $idPromocion, [
             'headers' => [
                 'Accept' => 'application/json'
             ]
         ]);
     }
}
