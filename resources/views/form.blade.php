@extends('layouts.main') 
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
@endsection
@section('volver')
<a href="{{ asset('/resultados') }}/{{ $codigo }}" class="btn-header"><img src="{{ asset('img/icons/arrow.png') }}" alt="" width="32"> Volver</a> @endsection @section('contenido')

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

                    <input type="hidden" id="descargar_resultado" name="descargar_resultado" value="{{ $pdf }}">
                    <input type="hidden" id="enviar_email" name="enviar_email" value="{{ $enviar_email }}">
                    <input type="hidden" id="instalador" name="instalador" value="{{ $instalador }}">
                    <input type="hidden" id="codigo" name="codigo" value="{{ $codigo }}">
                    @csrf

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
                            <input type="text" placeholder="Teléfono*" name="telefono" id="phone" required>
                        </div>
                        <div class="row col-md-6">
                            <input type="text" placeholder="Comuna*" name="comuna" id="comuna" required>
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="row col-md-12 mensajes">
                            <p class="requeridos">(*) Campos requeridos</p>
                            <p class="requeridos error">Por favor complete los campos en rojo.</p>
                            <p class="requeridos email">Ingrese un email válido.</p>
                        </div>
                    </div>

                    <div class="terminos-y-condiciones">
                        <div class="item">
                            <div class="pretty p-image p-plain">
                                <input type="checkbox" id="tyc" />
                                <div class="state">
                                    <img class="image" src="{{ asset('img/checkbox.svg') }}">
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <label for="tyc">Al hacer clic en la casilla de verificación, usted está entregando a Pizarreño Cedral el consentimiento explícito para usar sus datos para campañas de Marketing y está de acuerdo con nuestra política de privacidad. Usted puede solicitar ser borrado de nuestras bases de datos en cualquier momento escribiendo a contacto.cl@etexgroup.com.</label>
                        </div>
                    </div>
                    <div class="tyc-requerido">
                        <p class="requeridos" style="color:red;">Por favor acepte las condiciones para continuar.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center mt62 p0">
                            <a href="{{ asset('/resultados') }}/{{ $codigo }}" class="md-gray-btn">Volver</a> 
                            @if($pdf === 'true' && $instalador === 'false' && $enviar_email === 'false')
                            <a href="{{ asset('/descargar-pdf') }}/{{ $codigo }}" class="md-orange-btn btnSubmit">Descargar</a> 
                            @else
                            <a href="#" class="md-orange-btn btnSubmit">Enviar</a> 
                            @endif
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>
@endsection @section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/validForm.js') }}"></script>
@endsection
