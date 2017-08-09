<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use App\User;
use Exception;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class UserController extends Controller
{
    /**
     * Show the view to edit User information
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Get the instance to make HTTP Requests        
        $client = User::getClient();

        try {
            
            $response = User::getUserInformation($client, Session::get('USER_ID'), Session::get('ACCESS_TOKEN'));
        } catch (RequestException $e) {
            // In something went wrong it will redirect to home page
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return view('user.edit'); 
        }
        
        // Get the response body from HTTP Request and parse to Object        
        $user = json_decode($response->getBody()->getContents());

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Validate request

        // Get the instance to make HTTP Requests        
        $client = User::getClient();

        try {
            $response = User::edit($client, $request, Session::get('USER_ID'), Session::get('ACCESS_TOKEN'));
        } catch (RequestException $e) {
            // If something went wrong it will redirect to home page
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return view('user.edit'); 
        }

         // Get the response body from HTTP Request and parse to Object        
        return redirect()->home();

    }

    public function editPassword()
    {
        return view('user.edit-password');
    }

    public function updatePassword(Request $request)
    {
        // Get the instance to make HTTP Requests        
        $client = User::getClient();

        try {
            $response = User::changePassword($client, $request, Session::get('USER_ID'), Session::get('ACCESS_TOKEN'));
        } catch (RequestException $e) {
            
            $statusCode =  $e->getResponse()->getStatusCode();

            if($statusCode == 400) {
                // In something went wrong it will redirect to home page
                session()->flash('error', 'Por favor, verifique que su contraseña actual es la correcta');
                return Redirect::to('/cambiar-contrasena' . "#inicia");
            } else {
                echo Psr7\str($e->getResponse());
            }
            
        }

        session()->flash('message', 'Su contraseña ha sido cambiada');
        return redirect()->home();

    }

    public function showMembresias()
    {
        // Get the instance to make HTTP Requests        
        $client = User::getClient();

        try {
            $response = User::getUserMembresias($client, Session::get('ACCESS_TOKEN'), Session::get('USER_ID'));
        } catch (RequestExeption $e) {
            // If something went wrong it will redirect to /mi-cuenta
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return Redirect::to('/mi-cuenta');
        }

        // Get the response body from HTTP Request and parse to Object        
        $membresias = json_decode($response->getBody()->getContents());

        return view('user.membresias', compact('membresias'));
    }
}
