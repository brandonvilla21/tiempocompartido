<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use App\User;
use Session;

class RegistrationController extends Controller
{

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Validation form from server side
         $this->validate($request, [
            'user'              => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'password_confirm'  => 'required',
        ]);

        // Get the instance to make HTTP Requests        
        $client = User::getClient();
        try {
            // Register a new user
            $response = User::registerUser($client, $request);

        } catch (ClientException $e) {
            // In case something went wrong it will redirect to register view
            session()->flash('error', 'Hubo un error al registrarte, por favor intente de nuevo');
            return view('registration.signup'); 
        }


        if ($response->getStatusCode() == 200)
        {   
             try {
                // Logs the new user
                $response = User::logUser($client, $request);
             } catch (RequestException $e) {
                // In case something went wrong it will redirect to login
                session()->flash('error', 'Hubo un error al ingresar, por favor intente de nuevo');
                return view('session.login'); 
             }

            // Get the body from request response
            $requestObj = json_decode($response->getBody()->getContents());
            
             // Save the token and user information in Session
            Session::put([
                'ACCESS_TOKEN'  => $requestObj->id,
                'USER_ID'       => $requestObj->userId,
                'EMAIL'         => $request->email,
                'NAME'          => $request->user
            ]);
      
            session()->flash('message', '¡Bienvenido a Tiempo Compartido!');
            //Redirect to the homepage.
            return redirect()->home();
        }       
    }
}
