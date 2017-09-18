<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordApiController extends Controller
{
    public function index($access_token)
    {
        return view('reset-password.index', compact('access_token'));
    }

    public function store(Request $request)
    {
        ///reset-password?access_token=DEqJXNoIrC9Bxz2b2VmOPYavtkCiH89ZETtQ4drz8JaP6Z9vaKaaJxKWBRBsR7Pu"
        $url = 'People/reset-password?access_token='.$request->__access_token;
        $response = getClient()->request('POST', $url, [
            'headers' => [
                'Accept'  => 'application/json'
            ],
            'form_params' => [
                'newPassword'  => 'application/json'
            ]
        ]);

        return var_dump(json_decode($response->getBody()->getContents()));
        

    }
}
