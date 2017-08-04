<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Membresia;
use Session;

class MembresiaController extends Controller
{
    /**
     * Show the form for creating a new resource (membresia).
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membresia.create');
    }
    /**
     * Store a newly created resource (membresia) in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validation form from server side
       
        // Get the instance to make HTTP Requests        
        $client = User::getClient();

        try {
            // Store a new membresias
            $response = Membresia::storeMembresia($client, $request, Session::get('USER_ID'), Session::get('ACCESS_TOKEN'));
        } catch (ClientException $e) {
            // In case something went wrong it will redirect to register view
            session()->flash('error', 'Hubo un error al registrar la nueva membresia, por favor intente de nuevo');
            return view('membresia.create'); 
        }

        return view('mis-membresias');
    }

    /**
     * Display the specified Membresia.
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
            $response = Membresia::findById($client, $id);  
        } catch (RequestException $e) {
            // In case something went wrong it will redirect to /
            session()->flash('error', 'Ocurrio un error al acceder a esta membresia, por favor, intente de nuevo.');
            return view('home.index');
        }

        // Get the response body from HTTP Request and parse to Object
        $membresia = json_decode($response->getBody()->getContents());

        //Return to /membresias/{titulo}/{id} with the Object: $membresia
        return view('membresia.show', compact('membresia'));
    }
}
