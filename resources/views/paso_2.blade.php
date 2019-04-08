@extends('layouts.main') @section('contenido')

<section class="pasos" id="paso2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if($titulo == 'cerramiento')
                    <h3>Calculador <span class="selection">como cerramiento sobre consutrucción liviana</span></h3>
                @else
                    <h3>Calculador <span class="selection">como rebestimiento sobre albañilería</span></h3>
                @endif
            </div>
        </div>

        <hr style="margin-bottom: 0px;">
        <div class="m-wrap">
            <div class="total-row">
                <p>TOTAL</p>
                <div class="divider-dotted"></div>
                <p class="total-mt">
                    <let id="totalMts">100.456</let> mts</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="m-wrap">
                <div class="col-md-12 p0 mt20">
                    <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                    <h4 class="table_title">Fachadas <span class="grey">a revestir</span>
                        <let class="light">(Superficie y diseño)</let>
                    </h4>
                </div>
                <table class="table-calculator">
                    <tr>
                        <th></th>
                        <th>Alto</th>
                        <th>Ancho</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td class="first-line"><img src="img/rectangulo.png" alt=""> Fachada - rectangular</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="plus">+</td>
                    </tr>
                    <tr>
                        <td class="first-line"><img src="img/rectangulo.png" alt=""> Fachada - rectangular</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="plus">+</td>
                    </tr>
                </table>
            </div>
            <hr class="dotted">
            <div class="m-wrap">
                <table class="table-calculator">
                    <tr>
                        <td class="first-line"><img src="img/triangulo.png" alt=""> Fachada - rectangular</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="plus">+</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="large-button">
                <h3>Las superficies a revestir poseen puertas o ventanas?</h3>
                <div class="btn-container">
                    <a href="#" class="orange-btn" id="btnPVSi">Si</a>
                    <a href="#" class="gray-btn" id="btnPVNo">No</a>
                </div>
            </div>

            <section id="puertasyventanas">
                <div class="m-wrap">
                    <div class="col-md-12 p0 mt20">
                        <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                        <h4 class="table_title">Vanos
                            <let class="light">(Puertas y Ventanas)</let>
                        </h4>
                    </div>
                    <table class="table-calculator">
                        <tr>
                            <th></th>
                            <th>Alto</th>
                            <th>Ancho</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td class="first-line"><img src="img/rectangulo.png" alt=""> Puerta</td>
                            <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                            <td class="plus">+</td>
                        </tr>
                        <tr>
                            <td class="first-line"><img src="img/rectangulo.png" alt=""> Puerta</td>
                            <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                            <td class="plus">+</td>
                        </tr>
                    </table>
                </div>
                <hr class="dotted">
                <div class="m-wrap">
                    <table class="table-calculator">
                        <tr>
                            <td class="first-line"><img src="img/ventana.png" alt=""> Ventana</td>
                            <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                            <td class="plus">+</td>
                        </tr>
                    </table>
                </div>
            </section>

            <div class="large-button">
                <h3>Quiere utilizar perfiles de remate?</h3>
                <div class="btn-container">
                    <a href="#" class="orange-btn" id="btnPerfilesSi">Si</a>
                    <a href="#" class="gray-btn" id="btnPerfilesNo">No</a>
                </div>
            </div>

            <section id="perfiles">
                <div class="m-wrap">
                    <div class="col-md-12 p0 mt20">
                        <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                        <h4 class="table_title">Esquinas
                            <let class="light">(Externas, Internas y Cierre lateral)</let>
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3 p0">
                            <img src="img/esquinas.png" alt="">
                        </div>
                        <div class="col-md-8">
                            <table class="table-esquinas">
                                <tr>
                                    <th></th>
                                    <th>Cantidad</th>
                                </tr>
                                <tr>
                                    <td>Externas</td>
                                    <td class="oline"><input type="number" class="input_text" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Internas</td>
                                    <td class="oline"><input type="number" class="input_text" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Cierre lateral</td>
                                    <td class="oline"><input type="number" class="input_text" value="0"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <div class="row">
            <div class="col-md-12 text-center mt62 p0">
                <a href="{{ asset('/') }}" class="big-gray-btn">Volver</a>
                <a href="#" class="big-orange-btn">Finalizar</a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    
    <script>
        $('#btnPVSi').on('click', function(e){
            e.preventDefault();
            $("#puertasyventanas").slideDown();
        });
        
        $('#btnPVNo').on('click', function(e){
            e.preventDefault();
            $("#puertasyventanas").slideUp();
        });
        
        $('#btnPerfilesSi').on('click', function(e){
            e.preventDefault();
            $("#perfiles").slideDown();
        });
        
        $('#btnPerfilesNo').on('click', function(e){
            e.preventDefault();
            $("#perfiles").slideUp();
        });
    
    </script>
    
@endsection
