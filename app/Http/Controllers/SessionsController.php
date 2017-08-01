<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Session;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Logs the User
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validation form from server side
         $this->validate($request, [
            'email'             => 'required',
            'password'          => 'required'
        ]);

        // Get the instance to make HTTP Requests        
        $client = User::getClient();
        
        
        try {
            // Logs the new user
            $response = User::logUser($client, $request);
        } catch (RequestException $e) {
            // In case email and password not matching it will throw an exception
            // And it will be redirected to login view with a message 
            session()->flash('error', 'El usuario o contraseña no coinciden');
            return view('login'); 
        }

        // echo $response->getBody();
        
        // Get the body from request response
        $body = (string) $response->getBody();
        
        // Get the token from the string
        $token = User::getTokenFromString($body);
        
        // Save the token and user information in Session
        Session::put([
            'token' => $token,
            'email' => $request->email
        ]);

        return redirect()->home();
        
    }

    public function destroy()
    {   
        // Remove all from session
        Session::flush();

        return redirect()->home();

    }
}
