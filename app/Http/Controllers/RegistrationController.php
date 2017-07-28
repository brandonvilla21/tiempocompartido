<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegistrationController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Example of how to use HTTP Requests with with Guzzle (create the correct HTTP Request)
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://0.0.0.0:3000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        // Send a request to http://0.0.0.0:3000/api/promociones
        $response = $client->request('GET', 'promociones', [
            'headers' => [
                'User-Agent' => 'testing/1.0',
                'Accept'     => 'application/json',
            ]
        ]);
        echo $response->getBody() ;
        
        // Example from SoF
        // $client = new Client(); //GuzzleHttp\Client
        // $result = $client->post('your-request-uri', [
        //     'form_params' => [
        //         'sample-form-data' => 'value'
        //     ]
        // ]);
    }


}
