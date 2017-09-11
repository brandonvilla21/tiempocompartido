<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    public function index()
    {
        try {
            
            $responsePaises = Pais::allPaises(getClient());

        } catch (RequestException $e) {
            // In case something went wrong it will redirect to register view
            session()->flash('error', 'Hubo un error, por favor intente de nuevo');
            return Redirect::to('/');
        }

        $paises = json_decode($responsePaises->getBody()->getContents());

        return view('busqueda2', compact('paises'));

    }
}
