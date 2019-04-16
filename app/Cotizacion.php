<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = "cotizaciones";
    
    protected $fillable = [
        'codigo', 'titulo', 'fachadas_rectangulares', 'fachadas_triangulares', 'puertas', 'ventanas', 'perfiles', 'mt2aRevestir', 'perfilBase', 'perfilJ', 'perfilL', 'perfilCortagotera'
    ];
}
