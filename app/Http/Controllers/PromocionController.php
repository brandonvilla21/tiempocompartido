<?php

namespace App\Http\Controllers;

use App\Promocion;
use App\User;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    /**
     * Display a listing of Promociones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the instance to make HTTP Requests
        $client = User::getClient();
        try {
            // Get all Promociones
            $response = Promocion::getAll($client);
        } catch (RequestException $e) {
            // In case something went wrong it will redirect to /promociones without any information
            return view('promocion.index');
        }

        // Get the response body from HTTP Request and parse to Object
        $promociones = json_decode($response->getBody()->getContents());

        //Return to /promociones with the Object: $promociones
        return view('promocion.index', compact('promociones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $titulo
     * @param  String  $id
     * @return \Illuminate\Http\Response
     */
    public function show($titulo, $id)
    {
        // Get the instance to make HTTP Requests
        $client = User::getClient();  

        try {
            // Get a single promocion
            $response = Promocion::findById($client, $id);
        } catch (RequestException $e) {
            
            // In case something went wrong it will redirect to /promociones
            session()->flash('error', 'Ocurrio un error al acceder a esta promoción, por favor, intente de nuevo.');
            return view('promocion.index');
        }
        
        // Get the response body from HTTP Request and parse to Object        
        $promocion = json_decode($response->getBody()->getContents());

        //Return to /promociones/{titulo}/{id} with the Object: $promocion
        return view('promocion.show', compact('promocion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocion $promocion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocion $promocion)
    {
        //
    }
}
