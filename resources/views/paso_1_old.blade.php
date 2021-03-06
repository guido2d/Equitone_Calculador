@extends('layouts.main') 
@section('volver')
<a href="https://www.cedral.world/es-cl/sidings" target="_blank" class="btn-header"><img src="{{ asset('img/icons/arrow.png') }}" alt="" width="32"> Volver</a>
@endsection

@section('contenido')

<section class="pasos" id="paso1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>¿Para que será utilizado el Siding Pizarreño Cedral?</h3>
            </div>
        </div>

        <hr class="divider">

        <div class="row">
            <div class="col-md-4 box-selection col-md-offset-2">
                <div class="row">
                    <div class="col-md-6 p0">
                        <img src="img/albanileria.png" alt="">
                    </div>
                    <div class="col-md-5 p0">
                        <div class="flex-container">
                            <span class="title">Revestimiento <br>sobre albañilería
                                <br>
                                <a href="{{ asset('/siguiente?tipo=revestimiento') }}" class="orange-link">Calcular ></a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 box-selection" style="margin-left: 25px;">
                <div class="row">
                    <div class="col-md-6 p0">
                        <img src="img/construccion_liviana.png" alt="">
                    </div>
                    <div class="col-md-5 p0">
                        <div class="flex-container">
                            <span class="title">Tabique <br>de construcción liviana
                                <br>
                                <a href="{{ asset('/siguiente?tipo=cerramiento') }}" class="orange-link">Calcular ></a>
                                </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection