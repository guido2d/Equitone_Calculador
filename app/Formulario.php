<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = "formulario";

    protected $fillable = [
        'nombre', 'email', 'telefono', 'comunica', 'codigo_cotizacion', 'instalador', 'tiempo_construccion'
    ];

}
