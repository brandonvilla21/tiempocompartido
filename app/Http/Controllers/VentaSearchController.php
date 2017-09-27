<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Membresia;

class VentaSearchController extends Controller
{
    public function index()
    {
        try {
            $response = Membresia::getByFilter(getClient(), '[where][venta]=true&filter[where][renta]=false');
        }  catch (RequestException $e) {
            // In case something went wrong it will redirect to /
            session()->flash('error', 'Ha ocurrido un error, por favor, intente de nuevo.');
            return view('home.index');
        }
        $membresias = json_decode($response->getBody()->getContents());
        return var_dump($membresias);
        return view('ventas.index');
    }
}
