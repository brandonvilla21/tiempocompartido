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
     * Show the form for creating a new resource.
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
        // Register a new user
        $response = User::registerUser($client, $request);

        if ($response->getStatusCode() == 200)
        {   
            // Logs the new user
            $response = User::logUser($client, $request);

            // Get the body from request response
            $body = (string) $response->getBody();
            
            // Get the token from the string ($body)
            $token = User::getTokenFromString($body);
            
             // Save the token and user information in Session
            Session::put([
                'token' => $token,
                'email' => $request->email,
                'name' => $request->user
            ]);


            
            session()->flash('message', '¡Bienvenido a Tiempo Compartido!');
            //Redirect to the homepage.
            return redirect()->home();
        }       
    }
}
