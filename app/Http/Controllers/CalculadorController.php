<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cotizacion;

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
        return view('paso_2_volver', compact('fachadas_rectangulares', 'fachadas_triangulares', 'puertas', 'ventanas', 'perfiles', 'mt2', 'codigo', 'titulo', 'perfilBase'));
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
    
    
}
