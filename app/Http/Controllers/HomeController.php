<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Destacado;
use App\Membresia;

class HomeController extends Controller
{
    /**
     * Display a listing of Membresias
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            // Get all membresias
            $responseMembresias = Membresia::getMembresias(getClient());
            // Get membresias related to tipoInmueble = CABANA
            $responseInmueble = Membresia::getTipoInmueble(getClient(), ('CABANA'));
            // Get destacados
            $responseDestacados = Destacado::getAll(getClient());

        } catch (RequestException $e) {
            // In case something went wrong it will redirect to home page
            return view('home.index');
        }
        
        // Get the response body from HTTP Request and parse to Object        
        $membresias = json_decode($responseMembresias->getBody()->getContents());
        // Get the response body from HTTP Request and parse to Object        
        $membresiasInmueble = json_decode($responseInmueble->getBody()->getContents());
        // Get the response body from HTTP Request and parse to Object        
        $destacados = json_decode($responseDestacados->getBody()->getContents());
        
        // Return to home view with the Object: $membresias
        return view('home.index', compact(['membresias', 'membresiasInmueble', 'destacados']));

    }

}
