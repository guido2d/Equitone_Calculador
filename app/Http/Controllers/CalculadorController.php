<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadorController extends Controller{
    
    public function paso2(Request $request){
        
        $titulo = $request->get('tipo');
        
        return view('paso_2', compact('titulo'));
        
    }
    
    
}
