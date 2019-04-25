<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;

class EmailController extends Controller
{
    public function enviarMail(Request $request){
        $data = array(
            "nombre" => $request->get('nombre'),
            "email" => $request->get('email'),
            "telefono" => $request->get('telefono'),
            "comuna" => $request->get('comuna'),
        );
        
        if(isset($request->get('mtsRevestir'))){
            $mtsRevestir = $request->get('mtsRevestir');
            array_push($data,[
                'mtsRevestir' => $mtsRevestir,
            ]);
        }
        
        if(isset($request->get('tiempo_construccion'))){
            $tiempo_construccion = $request->get('tiempo_construccion');
            array_push($data,[
                'tiempo_construccion' => $tiempo_construccion,
            ]);
        }
        
        Mail::send('email.email', $data, function($message){
            //mensaje enviado por
            $message->from('info@ug.uchile.cl', 'Cedral');

            //mensaje para
            $message->to('guido@solucionesacitv.com.ar', 'Cedral')->subject('Nueva cotización');

        });
        
        return 'Su mensaje ha sido enviado correctamente.';
        /*return redirect('/')->with('enviado', 'mensaje enviado');*/
        
    }
}
