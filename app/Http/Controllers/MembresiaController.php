<?php

namespace App\Http\Controllers;


use App\User;
use Session;
use Redirect;
use Exception;
use App\Membresia;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

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

        return Redirect::to('/mis-membresias');
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
     
    /**
     * Show the form for editing the specified membresia.
     *
     * @param  String $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the instance to make HTTP Requests
        $client = User::getClient(); 

        try {
            $response = Membresia::findByid($client, $id);
        } catch (RequestException $e) {
            // In case something went wrong it will redirect to /mis-membresias
            session()->flash('error', 'Por favor intente de nuevo');
            return Redirect::to('/mis-membresias' . '#inicia');
        }

        $membresia = json_decode($response->getBody()->getContents());
        
        return view('membresia.edit',  compact('membresia'));

    }

    /**
     * Update the specified membresia in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Get the instance to make HTTP Requests        
        $client = User::getClient();

        try {
            $response = Membresia::edit($client, $request, Session::get('USER_ID'), Session::get('ACCESS_TOKEN'));
        } catch (RequestException $e) {
            // If something went wrong it will redirect to home page
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return redirect()->home(); 
        }

        session()->flash('message', 'Membresia actualizada con éxito');
        return Redirect::to('/mis-membresias');
    }

}
