@extends('layouts.main') @section('contenido')

<section class="pasos" id="paso1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Para que será utilizado el Siding Pizarreño Cedral?</h3>
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
                            <span class="title">Como rebestimiento <br>sobre albañilería
                                <br>
                                <a href="{{ asset('/paso2?tipo=rebestimiento') }}" class="orange-link">Calcular ></a>
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
                            <span class="title">Como cerramiento <br>sobre construcción liviana
                                <br>
                                <a href="{{ asset('/paso2?tipo=cerramiento') }}" class="orange-link">Calcular ></a>
                                </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection