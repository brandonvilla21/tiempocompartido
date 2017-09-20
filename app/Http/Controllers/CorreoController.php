<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use App\Correo;
use App\User;
use App\Email;
use Illuminate\Http\Request;

class CorreoController extends Controller
{
    public function contactOwner(Request $request)
    {   
        if ( !Session::has('ACCESS_TOKEN') ) {
            session()->flash('error', 'Necesitas iniciar sesion para contactar al propietario');
            return Redirect::back();
        }
        // Post correo to API
        try {
            // Store a new membresia
            $response = Correo::create(getClient(), $request, Session::get('USER_ID'), $request->destinatario );
        } catch (ClientException $e) {
            // In case something went wrong it will redirect to register view
            session()->flash('error', 'Hubo un error al registrar la nueva membresia, por favor intente de nuevo');
            return Redirect::back();
        }

        $confirm = json_decode($response->getBody()->getContents());

        if(isset($confirm->id)) {
            try {

                $responseDestinatario = User::findById(getClient(), $confirm->destinatarioId );

                $responseRemitente = User::findById(getClient(), $confirm->remitenteId );
            } catch (ClientException $e) {
                // In case something went wrong it will redirect to register view
                session()->flash('error', 'Hubo un error, por favor intente de nuevo');
                return Redirect::back();
            }

            $destinatario = json_decode($responseDestinatario->getBody()->getContents());
            $remitente = json_decode($responseRemitente->getBody()->getContents());
            // Send Email
            self::sendMail(pv($destinatario, 'email'), $request->nombre, $request->cuerpo);
            
            session()->flash('message','Su mensaje ha sido enviado');
            return Redirect::back();
        }
    }
    private function sendMail($emailDestinatario, $nombreRemitente, $mensaje)
    {
        $subject = "TIENES UN NUEVO MENSAJE EN TIEMPO COMPARTIDO";
        $html = '
         <html>
            <title></title>
            <div>
                <h1>'. $nombreRemitente .' te ha mandado un mensaje</h1>
                <hr>
                <p>
                    '. $mensaje .'
                </p>
                <p>Para ver mas información sobre el mensaje entra a tus mensajes</p>
                <a href="'.$_ENV['HOST'].'mis-mensajes" >Ir a mis mensajes</a>
            </div>
         </html>
        ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers = "Content-type:text/html;charset=UTF-8";
        
        try {
            $response = Email::send(getClient(), $emailDestinatario, $subject, $html, $headers);
        } catch (Exception $e) {
            // return dd($e);
            return false;
        }
        return true;

    }
}
