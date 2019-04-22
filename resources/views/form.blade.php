@extends('layouts.main') 
@section('volver')
<a href="{{ asset('/resultados') }}/{{ $codigo }}" class="btn-header"><img src="{{ asset('img/icons/arrow.png') }}" alt="" width="32"> Volver</a>
@endsection
@section('contenido')

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
                            <input type="text" placeholder="Nombre*" name="nombre" id="nombre" required>
                        </div>
                        <div class="row col-md-6">
                            <input type="text" placeholder="Email*" name="email" id="email" required>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        <div class="row col-md-6">
                            <input type="text" placeholder="Teléfono*" name="phone" id="phone" required>
                        </div>
                        <div class="row col-md-6">
                            <input type="text" placeholder="Comuna*" name="comuna" id="comuna" required>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:20px;">
                        <div class="row col-md-12">
                            @if($pdf == 'no')
                                <input type="text" class="w90" placeholder="Cantidad de metros a revestir*" required>
                            @else
                                <select name="tiempo_construccion" id="tiempo_construccion" class="w90" required>
                                    <option value="" selected>Considera realizar la construcción/refacción durante</option>
                                    <option value="1">3 meses</option>
                                    <option value="2">6 meses</option>
                                    <option value="3">Próximo año</option>
                                </select>
                            @endif
                            <p class="requeridos">(*) Campos requeridos</p>
                            <p class="requeridos error">Por favor complete los campos en rojo.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center mt62 p0">
                            <a href="{{ asset('/resultados') }}/{{ $codigo }}" class="md-gray-btn">Volver</a>
                            @if($pdf == 'no')
                                <a href="#" class="md-orange-btn btnSubmit">Enviar</a>
                            @else
                                <a href="{{ asset('/descargar-pdf') }}/{{ $codigo }}" class="md-orange-btn btnSubmit">Descargar</a>
                            @endif
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </div>

    </div>
</section>
@endsection


@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $('.btnSubmit').on('click', function(e){
        e.preventDefault();
        var errores = false;
        var href = $(this).attr('href');
        
        $('.form-cta').find('input').each(function (index, element) {
            var valor = $(this).val();
            if(valor == ""){
                $(this).addClass("error");
                $('.requeridos.error').fadeIn();
                errores = true;
            }else{
                $(this).removeClass("error");
            }
        });
        
        var select = $('#tiempo_construccion');
        if(select.val() == ""){
            select.addClass("error");
            $('.requeridos.error').fadeIn();
            errores = true;
        }else{
            select.removeClass("error");
        }
        console.log(errores);
        if(errores == false){
            $('.requeridos.error').fadeOut();
            window.location.href = href;
        }
    });
</script>

@endsection
