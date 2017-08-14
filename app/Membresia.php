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
                'sala'                  => isset($request->sala),
                'dormitorios'           => $request->dormitorios,
                'lockOff'               => isset($request->lockOff),
                'tipoInmueble'          => $request->tipoInmueble,
                'banosCompletos'        => $request->banosCompletos,
                'banosMedios'           => $request->banosMedios,
                'tipoCocina'            => $request->tipoCocina,
                'maxOcupantes'          => $request->maxOcupantes,
                'maxPrivacidad'         => $request->maxPrivacidad,
                'frecSemanasPorAnio'    => $request->frecSemanasPorAnio,
                'frecCadaAnios'         => $request->frecCadaAnios,
                'compraFecha'           => $request->compraFecha,
                'ocultarFecha'          => isset($request->ocultarFecha),
                'compraCaduca'          => isset($request->compraCaduca),
                'compraCaducidad'       => $request->compraCaducidad,
                'mantenimiento'         => isset($request->mantenimiento),
                'mantenimientoImporte'  => $request->mantenimientoImporte,
                'mantenimientoMoneda'   => $request->mantenimientoMoneda,
                'venta'                 => isset($request->venta),
                'ventaPrecio'           => $request->ventaPrecio,
                'ventaMoneda'           => $request->ventaMoneda,
                'ventaNegociable'       => isset($request->ventaNegociable),
                'ventaOcultarImporte'   => isset($request->ventaOcultarImporte),
                'renta'                 => isset($request->renta),
                'rentaPrecio'           => $request->rentaPrecio,
                'rentaMoneda'           => $request->rentaMoneda,
                'rentaNegociable'       => isset($request->rentaNegociable),
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
     * Updates a specific Membresia by HTTP Request 
     * Method: PUT
     * URI: http://0.0.0.0:3000/api/Membresia/{id}
     */
    public static function edit($client, $request, $idPerson, $ACCESS_TOKEN)
    {
        return $client->request('PUT', 'Membresia', [
            'form_params' => [
                'titulo'                => $request->titulo,
                'title'                 => $request->title,
                'clubNombre'            => $request->clubNombre,
                'clubUrl'               => $request->clubUrl,
                'semanaTipo'            => $request->semanaTipo,
                'descripcion'           => $request->descripcion,
                'description'           => $request->description,
                'sala'                  => isset($request->sala),
                'dormitorios'           => $request->dormitorios,
                'lockOff'               => isset($request->lockOff),
                'tipoInmueble'          => $request->tipoInmueble,
                'banosCompletos'        => $request->banosCompletos,
                'banosMedios'           => $request->banosMedios,
                'tipoCocina'            => $request->tipoCocina,
                'maxOcupantes'          => $request->maxOcupantes,
                'maxPrivacidad'         => $request->maxPrivacidad,
                'frecSemanasPorAnio'    => $request->frecSemanasPorAnio,
                'frecCadaAnios'         => $request->frecCadaAnios,
                'compraFecha'           => $request->compraFecha,
                'ocultarFecha'          => isset($request->ocultarFecha),
                'compraCaduca'          => isset($request->compraCaduca),
                'compraCaducidad'       => $request->compraCaducidad,
                'mantenimiento'         => isset($request->mantenimiento),
                'mantenimientoImporte'  => $request->mantenimientoImporte,
                'mantenimientoMoneda'   => $request->mantenimientoMoneda,
                'venta'                 => isset($request->venta),
                'ventaPrecio'           => $request->ventaPrecio,
                'ventaMoneda'           => $request->ventaMoneda,
                'ventaNegociable'       => isset($request->ventaNegociable),
                'ventaOcultarImporte'   => isset($request->ventaOcultarImporte),
                'renta'                 => isset($request->renta),
                'rentaPrecio'           => $request->rentaPrecio,
                'rentaMoneda'           => $request->rentaMoneda,
                'rentaNegociable'       => isset($request->rentaNegociable),
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
    /**
     * Send the route of an Image related to a Membresia by HTTP Request 
     * Method: POST
     * URI: http://0.0.0.0:3000/api/Membresia/{id}/imagenes
     */
    public static function setImage($client, $request, $ACCESS_TOKEN, $filename, $tipo)
    {
        return $client->request('POST', 'Membresia/'. $request->membresiaId. '/imagenes', [
            'form_params' => [
                'src'         => $filename,
                'descripcion' => 'Descripción de la imagen',
                'tipo'        => $tipo,
                'orden'       => 0,
                'principal'   => true,
            ],
            'headers' => [
                'Authorization' => $ACCESS_TOKEN,
                'Accept' => 'application/json'
            ]
        ]);
    }
}
