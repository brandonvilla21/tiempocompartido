<?php

namespace App\Http\Controllers;


use Image;
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
        $client = getClient();

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
        $client = getClient();  

        try {
            // Get a single promocion
            $response   = Membresia::findById($client, $id);  
            $isFavorito = User::isFavorito($client, $id, Session::get('USER_ID'), Session::get('ACCESS_TOKEN'));
        } catch (RequestException $e) {
            // In case something went wrong it will redirect to /
            session()->flash('error', 'Ocurrio un error al acceder a esta membresia, por favor, intente de nuevo.');
            return view('home.index');
        }

        // Get the response body from HTTP Request and parse to Object
        $membresia = json_decode($response->getBody()->getContents());

        //Return to /membresias/{titulo}/{id} with the Object: $membresia
        return view('membresia.show', compact(['membresia', 'isFavorito']));
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
        $client = getClient(); 

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
        $client = getClient();

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

    //::::::::: FUNCTIONS FOR IMAGES CONTROL ::::::::://
    
    /**
     * Show the form for creating a new resource (Image related to a membresia).
     *
     * @return \Illuminate\Http\Response
     */
    public function createImage($id)
    {
        // Get the instance to make HTTP Requests        
        $client = getClient();

        try {
            $response = Membresia::findById($client, $id);
        } catch (RequestException $e) {
            // If something went wrong it will redirect to home page
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return redirect()->home(); 
        }

        $membresia = json_decode($response->getBody()->getContents());

        return view('membresia.images.create', compact('membresia'));
        // return view('uploads2', compact('membresia'));
    }

    /**
     * Store a newly created resource (Image) in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {

        // Validate request
        // ...
        if ($request->hasFile('images')) {
            $post_image = $request->file('images');  
            // Get the instance to make HTTP Requests        
            $client = getClient();

            foreach($post_image as $key => $image ) {
                $filename = $request->membresiaTitulo . '-' .time() . '.' . $image->getClientOriginalExtension();
                $description = $request->{'descripcion-'.$key};
            
                // Save image in original size without oversized up to 1900
                Image::make($image)->resize(1900, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save( public_path('/uploads/membresias-images/') . $filename);
    
                // Save image in thumb folder giving it 300 for height and auto width
                Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save( public_path('/uploads/membresias-images/thumbs/') . $filename);    
                
                //Make POST to API and save image information
                try {
                    $response = Membresia::setImage($client, $request, Session::get('ACCESS_TOKEN'), $filename, 'thumb', $description );
                    $response = Membresia::setImage($client, $request, Session::get('ACCESS_TOKEN'), $filename, 'original', $description );
                } catch (RequestException $e) {
                    // If something went wrong it will redirect to home page
                    session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
                    return dd($e); 
                }
            }
        } else {
            session()->flash('error', 'Por favor intente subir la(s) imagen(es) de nuevo');
            return back()->withInput();
        }
        
        // Make POST to API
        
        return Redirect::to('/guardar-imagenes/' . $request->membresiaId . '#mis-imagenes');
        // return Redirect::back()->with('message','Las imágenes han sido guardadas.');
        
    }

    public function setLocation($id)
    {
        try {
            $response = Membresia::findById(getClient(), $id);
        } catch (RequestException $e) {
            // If something went wrong it will redirect to home page
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return redirect()->home();             
        }

        $membresia = json_decode($response->getBody()->getContents());

        return view('membresia.ubicacion', compact('membresia'));
    }

}
