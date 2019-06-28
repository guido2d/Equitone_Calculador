<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Formulario;
use App\Cotizacion;

use App\Mail\Contacto;

use PDF;
use Log;

class EmailController extends Controller
{
    public function enviarMail(Request $request){
        
        $mt2 = Cotizacion::where('codigo', $request->get('codigo'))->first();

        $data = array(
            "nombre" => $request->get('nombre'),
            "email" => $request->get('email'),
            "telefono" => $request->get('telefono'),
            "comuna" => $request->get('comuna'),
            "mtsRevestir" => $mt2->mt2aRevestir,
            "instalador" => ($request->get('instalador') === 'true') ? 'Si' : 'No'
        );

        $form = new Formulario();
        $form->nombre = $request->get('nombre');
        $form->email = $request->get('email');
        $form->telefono = $request->get('telefono');
        $form->comuna = $request->get('comuna');
        $form->codigo_cotizacion = $request->get('codigo');
        $form->instalador = ($request->get('instalador') === 'true') ? 'Si' : 'No';
        $form->save();

        $subject = 'Nueva cotización realiazada.';
        
        
        Mail::send('email.email', $data, function($message) use($subject){
            //mensaje enviado por
            $message->from('info@ug.uchile.cl', 'Cedral');

            //mensaje para
            $message->to('contacto.cl@etexgroup.com', 'Etex Group')->subject($subject);

        });

        Log::info($request->all());

        if( $request->get('enviar_email') === 'true' ){

            $archivo = $this->descargarPDF($request->get('codigo'));
            $email = $request->get('email');
            
            Mail::send('email.pdf', $data, function($message) use($email, $archivo){
                //mensaje enviado por
                $message->from('info@ug.uchile.cl', 'Cedral');
                
                // adjunto
                $message->attach(public_path($archivo));
    
                //mensaje para
                $message->to($email)->subject('Archivo PDF cotización generada.');

    
            });
        }
        
        return 1;
        
    }

    public function gracias(Request $request){

        $pdf = $request->get('pdf');
        
        if($pdf !== null){
            $pdf = $this->descargarPDF($pdf);
        }

        return view('gracias', compact('pdf'));
    }

    public function descargarPDF($codigo){

        $cotizaciones = Cotizacion::where('codigo', $codigo)->first();
        $fachadas_rectangulares = json_decode($cotizaciones->fachadas_rectangulares);
        $fachadas_triangulares = json_decode($cotizaciones->fachadas_triangulares);
        $puertas = json_decode($cotizaciones->puertas);
        $ventanas = json_decode($cotizaciones->ventanas);
        $perfiles = json_decode($cotizaciones->perfiles);
        $mt2 = $cotizaciones->mt2aRevestir;
        $titulo = $cotizaciones->titulo;
        $perfilBase = $cotizaciones->perfilBase;
        $perfilJ = $cotizaciones->perfilJ;
        $perfilL = $cotizaciones->perfilL;
        $perfilCortagotera = $cotizaciones->perfilCortagotera;
        
        /* CALCULOS PARA PDF */
        $materiales1 = [];
        $materiales2 = [];
        
        if($titulo == "revestimiento"){
            array_push($materiales1,[
                'posicion' => '1',
                'material' => 'Siding PIZARREÑO CEDRAL ® 19x3660 mm',
                'unidad' => 'm2',
                'cant1' => $mt2 * 1.7,
                'cant2' => $mt2 * 1.7,
            ]);

            array_push($materiales1,[
                'posicion' => '2',
                'material' => 'Membrana hidrófuga PIZARREÑO CEDRAL ®',
                'unidad' => 'm2',
                'cant1' => $mt2 * 1.65,
                'cant2' => $mt2 * 1.65,
            ]);

            array_push($materiales1,[
                'posicion' => '3',
                'material' => 'Perfil cortagotera base PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilBase,
                'cant2' => $perfilBase,
            ]);

            array_push($materiales1,[
                'posicion' => '4',
                'material' => 'Perfil J PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilJ,
                'cant2' => $perfilJ,
            ]);

            array_push($materiales1,[
                'posicion' => '5',
                'material' => 'Perfil esquinero PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilL,
                'cant2' => $perfilL,
            ]);

            array_push($materiales1,[
                'posicion' => '6',
                'material' => 'Perfil cortagotera ventana PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilCortagotera,
                'cant2' => $perfilCortagotera,
            ]);

            array_push($materiales1,[
                'posicion' => '7',
                'material' => 'Tornillos de fijación de perfiles de remate ¹',
                'unidad' => 'unid',
                'cant1' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
                'cant2' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
            ]);

            array_push($materiales1,[
                'posicion' => '8',
                'material' => 'Omega 35x38x0,85x3000 mm Aluzinc estructural',
                'unidad' => 'ml',
                'cant1' => 3.2 * $mt2,
                'cant2' => 1.5 * $mt2,
            ]);

            array_push($materiales1,[
                'posicion' => '9',
                'material' => 'Tornillo de fijación Siding a Omega ²',
                'unidad' => 'unid',
                'cant1' => 20 * $mt2,
                'cant2' => 13 * $mt2,
            ]);

            array_push($materiales2,[
                'posicion' => '1',
                'material' => 'Siding PIZARREÑO CEDRAL ® 19x3660 mm',
                'unidad' => 'Tiras',
                'cant1' => ($mt2 * 1.7) / 0.6954,
                'cant2' => ($mt2 * 1.7) / 0.6954,
            ]);

            array_push($materiales2,[
                'posicion' => '2',
                'material' => 'Membrana hidrófuga PIZARREÑO CEDRAL ®',
                'unidad' => 'Rollos',
                'cant1' => ($mt2 * 1.65) / 75,
                'cant2' => ($mt2 * 1.65) / 75,
            ]);

            array_push($materiales2,[
                'posicion' => '3',
                'material' => 'Perfil cortagotera base PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilBase / 2.5,
                'cant2' => $perfilBase / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '4',
                'material' => 'Perfil J PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilJ / 2.5,
                'cant2' => $perfilJ / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '5',
                'material' => 'Perfil esquinero PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilL / 2.5,
                'cant2' => $perfilL / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '6',
                'material' => 'Perfil cortagotera ventana PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilCortagotera / 2.5,
                'cant2' => $perfilCortagotera / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '7',
                'material' => 'Tornillos de fijación de perfiles de remate ¹',
                'unidad' => 'Unid',
                'cant1' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
                'cant2' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '8',
                'material' => 'Omega 35x38x0,85x3000 mm Aluzinc estructural',
                'unidad' => 'Unid',
                'cant1' => (3.2 * $mt2) / 3,
                'cant2' => (1.5 * $mt2) / 3,
            ]);

            array_push($materiales2,[
                'posicion' => '9',
                'material' => 'Tornillo de fijación Siding a Omega ²',
                'unidad' => 'Unid',
                'cant1' => 20 * $mt2,
                'cant2' => 13 * $mt2,
            ]);
            
        }else{
            
            /* REPORTE PARA CERRAMIENTO */
            array_push($materiales1,[
                'posicion' => '1',
                'material' => 'Siding PIZARREÑO CEDRAL ® 19x3660 mm',
                'unidad' => 'm2',
                'cant1' => $mt2 * 1.7,
                'cant2' => $mt2 * 1.7,
            ]);
            
            array_push($materiales1,[
                'posicion' => '2',
                'material' => 'Membrana hidrófuga PIZARREÑO CEDRAL ®',
                'unidad' => 'm2',
                'cant1' => $mt2 * 1.65,
                'cant2' => $mt2 * 1.65,
            ]);

            array_push($materiales1,[
                'posicion' => '3',
                'material' => 'Perfil cortagotera base PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilBase,
                'cant2' => $perfilBase,
            ]);

            array_push($materiales1,[
                'posicion' => '4',
                'material' => 'Perfil J PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilJ,
                'cant2' => $perfilJ,
            ]);
            
            array_push($materiales1,[
                'posicion' => '5',
                'material' => 'Perfil esquinero PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilL,
                'cant2' => $perfilL,
            ]);

            array_push($materiales1,[
                'posicion' => '6',
                'material' => 'Perfil cortagotera ventana PIZARREÑO CEDRAL ®',
                'unidad' => 'ml',
                'cant1' => $perfilCortagotera,
                'cant2' => $perfilCortagotera,
            ]);

            array_push($materiales1,[
                'posicion' => '7',
                'material' => 'Tornillos de fijación de perfiles de remate ¹',
                'unidad' => 'unid',
                'cant1' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
                'cant2' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
            ]);
            
            array_push($materiales1,[
                'posicion' => '8',
                'material' => 'Pie derecho Pino seco 2"x3"x3200 mm',
                'unidad' => 'ml',
                'cant1' => 3.2 * $mt2,
                'cant2' => 1.5 * $mt2,
            ]);

            array_push($materiales1,[
                'posicion' => '9',
                'material' => 'Solera Pino seco 2"x3"x3200 mm',
                'unidad' => 'unid',
                'cant1' => $perfilBase,
                'cant2' => $perfilBase,
            ]);
            
            array_push($materiales1,[
                'posicion' => '10',
                'material' => 'Tornillo de fijación Siding a Pino seco ²',
                'unidad' => 'unid',
                'cant1' => 20 * $mt2,
                'cant2' => 13 * $mt2,
            ]);
            
            array_push($materiales2,[
                'posicion' => '1',
                'material' => 'Siding PIZARREÑO CEDRAL ® 19x3660 mm',
                'unidad' => 'Tiras',
                'cant1' => ($mt2 * 1.7) / 0.6954,
                'cant2' => ($mt2 * 1.7) / 0.6954,
            ]);
            
            array_push($materiales2,[
                'posicion' => '2',
                'material' => 'Membrana hidrófuga PIZARREÑO CEDRAL ®',
                'unidad' => 'Rollos',
                'cant1' => ($mt2 * 1.65) / 75,
                'cant2' => ($mt2 * 1.65) / 75,
            ]);

            array_push($materiales2,[
                'posicion' => '3',
                'material' => 'Perfil cortagotera base PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilBase / 2.5,
                'cant2' => $perfilBase / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '4',
                'material' => 'Perfil J PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilJ / 2.5,
                'cant2' => $perfilJ / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '5',
                'material' => 'Perfil esquinero PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilL / 2.5,
                'cant2' => $perfilL / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '6',
                'material' => 'Perfil cortagotera ventana PIZARREÑO CEDRAL ®',
                'unidad' => 'Unid',
                'cant1' => $perfilCortagotera / 2.5,
                'cant2' => $perfilCortagotera / 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '7',
                'material' => 'Tornillos de fijación de perfiles de remate ¹',
                'unidad' => 'Unid',
                'cant1' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
                'cant2' => ($perfilBase + $perfilJ + $perfilCortagotera) * 2.5,
            ]);

            array_push($materiales2,[
                'posicion' => '8',
                'material' => 'Pie derecho Pino seco 2"x3"x3200 mm',
                'unidad' => 'Unid',
                'cant1' => (3.2 * $mt2) / 3.2,
                'cant2' => (1.5 * $mt2) / 3.2,
            ]);

            array_push($materiales2,[
                'posicion' => '9',
                'material' => 'Solera Pino seco 2"x3"x3200 mm',
                'unidad' => 'Unid',
                'cant1' => $perfilBase / 3.2,
                'cant2' => $perfilBase / 3.2,
            ]);
            
            array_push($materiales2,[
                'posicion' => '10',
                'material' => 'Tornillo de fijación Siding a Pino seco ²',
                'unidad' => 'Unid',
                'cant1' => 20 * $mt2,
                'cant2' => 13 * $mt2,
            ]);
        }
        
        $pdf = PDF::loadView('pdf.resultado', compact('fachadas_rectangulares', 
                                             'fachadas_triangulares', 
                                             'puertas', 'ventanas', 
                                             'perfiles', 
                                             'mt2', 
                                             'codigo', 
                                             'titulo', 
                                             'perfilBase',
                                             'perfilJ',
                                             'perfilL',
                                             'perfilCortagotera',
                                             'materiales1',
                                             'materiales2'));

        $now = new \DateTime();
        $hora = $now->format('dmHis');

        $titulo = "PizarreñoCedralCalculoMateriales-$hora.pdf";

        $pdf->save($titulo);

        return $titulo;
        
    }
}
