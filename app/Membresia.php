<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{

    /**
     * Store a new Membresia by HTTP Request 
     * Method: POST
     * URI: http://0.0.0.0:3000/api/Membresia 
     */
    public static function storeMembresia($client, $request, $idPerson, $ACCESS_TOKEN)
    {
        return $client->request('POST', 'Membresia', [
            'form_params' => [
                'titulo'                => $request->titulo,
                'title'                 => $request->title,
                'clubNombre'            => $request->clubNombre,
                'clubUrl'               => $request->clubUrl,
                'semanaTipo'            => $request->semanaTipo,
                'descripcion'           => $request->descripcion,
                'description'           => $request->description,
                'sala'                  => $request->sala,
                'dormitorios'           => $request->dormitorios,
                'lockOff'               => $request->lockOff,
                'tipoInmueble'          => $request->tipoInmueble,
                'banosCompletos'        => $request->banosCompletos,
                'banosMedios'           => $request->banosMedios,
                'tipoCocina'            => $request->tipoCocina,
                'maxOcupantes'          => $request->maxOcupantes,
                'maxPrivacidad'         => $request->maxPrivacidad,
                'frecSemanasPorAnio'    => $request->frecSemanasPorAnio,
                'frecCadaAnios'         => $request->frecCadaAnios,
                'compraFecha'           => $request->compraFecha,
                'ocultarFecha'          => $request->ocultarFecha,
                'compraCaduca'          => $request->compraCaduca,
                'compraCaducidad'       => $request->compraCaducidad,
                'mantenimientoImporte'  => $request->mantenimientoImporte,
                'mantenimientoMoneda'   => $request->mantenimientoMoneda,
                'venta'                 => $request->venta,
                'ventaPrecio'           => $request->ventaPrecio,
                'ventaMoneda'           => $request->ventaMoneda,
                'ventaNegociable'       => $request->ventaNegociable,
                'ventaOcultarImporte'   => $request->ventaOcultarImporte,
                'renta'                 => $request->renta,
                'rentaPrecio'           => $request->rentaPrecio,
                'rentaMoneda'           => $request->rentaMoneda,
                'rentaNegociable'       => $request->rentaNegociable,
                'status'                => $request->status,
                'telContacto'           => $request->telContacto,
                'cualSemanaFija'        => $request->cualSemanaFija,
                'cuantosPuntos'         => $request->cuantosPuntos,
                'cuantasNoches'         => $request->cuantasNoches,
                'cualTemporadaflotante' => $request->cualTemporadaflotante,
                'updated'               => $request->updated,
                'created'               => $request->created,
                'ubicadoEn'             => $request->ubicadoEn,
                'metodoPago'            => $request->metodoPago,
                'numCamas'              => $request->numCamas,
                'localidadNombre'       => $request->localidadNombre,
                'paisNombre'            => $request->paisNombre,
                'enlace_url'            => $request->enlace_url,
                'idPerson'              => $idPerson,
                
            ],
            'headers' => [
                'Authorization' => $ACCESS_TOKEN
            ]
        ]);
    }

     /**
     * Get all Membresias by HTTP Request 
     * Method: GET
     * URI: http://0.0.0.0:3000/api/Membresia 
     */
    public static function getMembresias($client)
    {
        return $client->request('GET', 'Membresia', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }

    /**
     * Get a single Membresias by HTTP Request 
     * Method: GET
     * URI: http://0.0.0.0:3000/api/Membresia/{id} 
     */
    public static function findById($client, $membresiaId)
    {
        return $client->request('GET', 'Membresia/'. $membresiaId, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }

}
