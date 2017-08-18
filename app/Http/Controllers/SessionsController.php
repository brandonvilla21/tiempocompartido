<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use App\User;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class SessionsController extends Controller
{
    /**
     * Show the form to Log a user.
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
        $client = getClient();
        
        
        try {
            // Logs the new user
            $response = User::logUser($client, $request);
        } catch (RequestException $e) {
            // In case email and password not matching it will throw an exception
            // And it will be redirected to login view with a message 
            session()->flash('error', 'El usuario o contraseña no coinciden');
            return Redirect::to('/login'. '#inicio'); 
        }

        // Get the response body from HTTP Request and parse to Object        
        $requestObj = json_decode($response->getBody()->getContents());
        // Save the ACCESS_TOKEN in Session
        Session::put([
            'ACCESS_TOKEN'  => $requestObj->id,
            'USER_ID'       => $requestObj->userId
        ]);
         
        // Make the request to get User information
        $response = User::getUserInformation($client, $requestObj->userId, $requestObj->id);

        // Get the response body from HTTP Request and parse to Object        
        $requestObj = json_decode($response->getBody()->getContents());

        // Save the token and user information in Session
        Session::put([
            'NAME'   => $requestObj->nickname,
            'EMAIL'  => $requestObj->email,
        ]);

        session()->flash('message', '¡Bienvenido de nuevo a Tiempo Compartido!');
        return redirect()->home();
        
    }

    public function destroy()
    {   
       
        // Request to logout from API
        try {
            // Get the instance to make HTTP Requests        
            $client = getClient();
            //Request to logout from back-end
            $response = User::logoutUser($client, Session::get('ACCESS_TOKEN'));

        } catch (RequestException $e) {       
            // In case something went wrong it will redirect to homepage, with a error message 
            session()->flash('error', 'Hubo un problema al intentar cerrar sesión, intentelo de nuevo');
            return redirect()->home();   
        }

        // Remove all from session
        Session::flush();

        return redirect()->home();

    }
}
