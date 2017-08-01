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
        return view('session.login');
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
            'email'     => 'required',
            'password'  => 'required'
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

        // Get the response body from HTTP Request and parse to Object        
        $requestObj = json_decode($response->getBody()->getContents());
        // Save the ACCESS_TOKEN in Session
        Session::put([
            'ACCESS_TOKEN'  => $requestObj,
            'USER_ID'        => $requestObj->userId
        ]);
         
        // Make the request to get User information
        $response = User::getUserInformation($client, $requestObj->userId, $requestObj->id);

        // Get the response body from HTTP Request and parse to Object        
        $requestObj = json_decode($response->getBody()->getContents());
        // Save the token and user information in Session
        Session::put([
            'NAME'   => $requestObj->realm,
            'EMAIL'  => $requestObj->email,
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
