<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Membresia;

class HomeController extends Controller
{
    /**
     * Display a listing of Membresias
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the instance to make HTTP Requests        
        $client = User::getClient();
        try {
            // Get all membresias
            $response = Membresia::getMembresias($client);
        } catch (RequestException $e) {
            // In case something went wrong it will redirect to home page
            return view('home.index');
        }
        
        // Get the response body from HTTP Request and parse to Object        
        $membresias = json_decode($response->getBody()->getContents());
        
        // Return to home view with the Object: $membresias
        return view('home.index', compact('membresias'));

    }

}
