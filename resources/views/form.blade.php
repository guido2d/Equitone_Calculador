@extends('layouts.main') @section('contenido')

<section class="pasos" id="formulario">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Por favor complete los siguientes datos</h3>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                <form action="#" class="form-cta">
                    
                    <div class="row">
                        <div class="row col-md-6">
                            <input type="text" placeholder="Nombre*" name="nombre">
                        </div>
                        <div class="row col-md-6">
                            <input type="text" placeholder="Email*" name="email">
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        <div class="row col-md-6">
                            <input type="text" placeholder="Teléfono*" name="phone">
                        </div>
                        <div class="row col-md-6">
                            <input type="text" placeholder="Comuna*" name="comuna">
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        <div class="row col-md-12">
                            @if($pdf == 'no')
                                <input type="text" class="w90" placeholder="Cantidad de metros a revestir*">
                            @else
                                <select name="tiempo_construccion" class="w90">
                                    <option value="" selected>Considera realizar la construcción/refacción durante</option>
                                    <option value="1">3 meses</option>
                                    <option value="2">6 meses</option>
                                    <option value="3">Próximo año</option>
                                </select>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center mt62 p0">
                            <a href="{{ asset('/resultados') }}/{{ $codigo }}" class="big-gray-btn">Volver</a>
                            @if($pdf == 'no')
                                <a href="#" id="btnCalcular" class="big-orange-btn">Enviar</a>
                            @else
                                <a href="{{ asset('/descargar-pdf') }}/{{ $codigo }}" id="btnCalcular" class="big-orange-btn">Descargar</a>
                            @endif
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </div>

    </div>
</section>
@endsection