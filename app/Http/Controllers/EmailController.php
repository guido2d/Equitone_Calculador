<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;

class EmailController extends Controller
{
    public function enviarMail(Request $request){
        
        $mtsRevestir = $request->get('mtsRevestir');
        $tiempo_construccion = $request->get('tiempo_construccion');
        
        $data = array(
            "nombre" => $request->get('nombre'),
            "email" => $request->get('email'),
            "telefono" => $request->get('telefono'),
            "comuna" => $request->get('comuna'),
            'mtsRevestir' => $mtsRevestir,
            'tiempo_construccion' => $tiempo_construccion,
        );
        
        if(isset($mtsRevestir)){
            $subject = "Nueva solicitud de instalador";
        }
        
        if(isset($tiempo_construccion)){
            $subject = "Nueva cotización";
        }
        
        Mail::send('email.email', $data, function($message) use($subject){
            //mensaje enviado por
            $message->from('info@ug.uchile.cl', 'Cedral');

            //mensaje para
            $message->to('guido@solucionesactiv.com.ar', 'Cedral')->subject($subject);

        });
        
        return 'Su mensaje ha sido enviado correctamente.';
        /*return redirect('/')->with('enviado', 'mensaje enviado');*/
        
    }
}
