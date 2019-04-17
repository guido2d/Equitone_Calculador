<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cotizacion;
use PDF;

class CalculadorController extends Controller{
    
    public function guardarCookie(Request $request){
        $this->validate($request, [
            'tipo' => 'required'
        ]);
        
        return redirect('paso2')->withCookie('tipo_cotizador', $request->get('tipo'), 60);
    }
    
    public function paso2(Request $request){
        
        $titulo = $request->cookie('tipo_cotizador');
        
        return view('paso_2', compact('titulo'));
    }
    
    public function paso2Volver($codigo){
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
        return view('paso_2_volver', compact('fachadas_rectangulares', 
                                             'fachadas_triangulares', 
                                             'puertas', 'ventanas', 
                                             'perfiles', 
                                             'mt2', 
                                             'codigo', 
                                             'titulo', 
                                             'perfilBase',
                                             'perfilJ',
                                             'perfilL',
                                             'perfilCortagotera'));
    }
    
    public function guardarCalculo(Request $request){
        $codigo = $request->get('codigo');
        if($codigo != ""){
            $cotizacion = Cotizacion::where('codigo', $codigo)->first();
            $cotizacion->titulo = $request->cookie('tipo_cotizador');
            $cotizacion->fachadas_rectangulares = json_encode($request->get('fachadas_rectangulares'));
            $cotizacion->fachadas_triangulares = json_encode($request->get('fachadas_triangulares'));
            $cotizacion->puertas = json_encode($request->get('puertas'));
            $cotizacion->ventanas = json_encode($request->get('ventanas'));
            $cotizacion->perfiles = json_encode($request->get('perfiles'));
            $cotizacion->mt2aRevestir = $request->get('mt2aRevestir');
            $cotizacion->perfilBase = $request->get('perfilBase');
            $cotizacion->perfilL = $request->get('perfilL');
            $cotizacion->perfilJ = $request->get('perfilJ');
            $cotizacion->perfilCortagotera = $request->get('perfilCortagotera');
            $cotizacion->save();
        }else{
            $codigo = "CL".date("d").date("m").date("y").date("H").date("i").date("s");
            $cotizacion = new Cotizacion;
            $cotizacion->codigo = $codigo;
            $cotizacion->titulo = $request->cookie('tipo_cotizador');
            $cotizacion->fachadas_rectangulares = json_encode($request->get('fachadas_rectangulares'));
            $cotizacion->fachadas_triangulares = json_encode($request->get('fachadas_triangulares'));
            $cotizacion->puertas = json_encode($request->get('puertas'));
            $cotizacion->ventanas = json_encode($request->get('ventanas'));
            $cotizacion->perfiles = json_encode($request->get('perfiles'));
            $cotizacion->mt2aRevestir = $request->get('mt2aRevestir');
            $cotizacion->perfilBase = $request->get('perfilBase');
            $cotizacion->perfilL = $request->get('perfilL');
            $cotizacion->perfilJ = $request->get('perfilJ');
            $cotizacion->perfilCortagotera = $request->get('perfilCortagotera');
            $cotizacion->save();
        }
        return $codigo;
        
    }
    
    public function paso3($codigo){
        
        $cotizaciones = Cotizacion::where('codigo', $codigo)->first();
        $fachadas_rectangulares = json_decode($cotizaciones->fachadas_rectangulares);
        $fachadas_triangulares = json_decode($cotizaciones->fachadas_triangulares);
        $puertas = json_decode($cotizaciones->puertas);
        $ventanas = json_decode($cotizaciones->ventanas);
        $perfiles = json_decode($cotizaciones->perfiles);
        $mt2 = $cotizaciones->mt2aRevestir;
        
        return view('paso_3', compact('fachadas_rectangulares', 'fachadas_triangulares', 'puertas', 'ventanas', 'perfiles', 'mt2', 'codigo'));
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
        
        return $pdf->download('invoice.pdf');
        
    }
    
    public function verPDF($codigo){
        
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
        
        return view('pdf.resultado', compact('fachadas_rectangulares', 
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
        
        
    }
    
    
}
