<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
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
            // In something went wrong it will redirect to home page
            session()->flash('error', 'Ha ocurrido un error inesperado, por favor intente de nuevo');
            return view('user.edit'); 
        }

         // Get the response body from HTTP Request and parse to Object        
        return redirect()->home();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editPassword()
    {
        return view('user.edit-password');
    }
}
