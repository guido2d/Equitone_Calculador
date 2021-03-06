@extends('layouts.main')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
@endsection
@section('volver')
<a href="{{ asset('/paso2/') }}/{{ $codigo }}" class="btn-header"><img src="{{ asset('img/icons/arrow.png') }}" alt=""
        width="32"> Volver</a>
@endsection
@section('contenido')

<section class="pasos" id="paso2">
    <div class="container">
        <hr>
        <!--FACHADAS-->
        <div class="row">
            <div class="m-wrap">
                <div class="col-md-12 p0 mt20">
                    <img src="{{ asset('img/fachada_revestir.png') }}" alt="" style="position: absolute;top: 1px;">
                    <h4 class="table_title">Resumen de datos informados</h4>
                </div>
                <table id="tableFachada" class="table-calculator">
                    <tr>
                        <th></th>
                        <th>Alto</th>
                        <th>Ancho</th>
                    </tr>
                    @if(is_array($fachadas_rectangulares) and sizeof($fachadas_rectangulares) > 0)
                    @foreach($fachadas_rectangulares as $fc)
                    <tr>
                        <td class="first-line">{{ $fc->nombre }}</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($fc->alto, 2, ',', '') }}"> mts</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($fc->ancho, 2, ',', '') }}"> mts</td>
                    </tr>
                    @endforeach
                    @endif

                    @if(is_array($fachadas_triangulares) and sizeof($fachadas_triangulares) > 0)
                    @foreach($fachadas_triangulares as $ft)
                    <tr>
                        <td class="first-line">{{ $ft->nombre }}</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($ft->alto, 2, ',', '') }}"> mts</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($ft->ancho, 2, ',', '') }}"> mts</td>
                    </tr>
                    @endforeach
                    @endif

                </table>
            </div>
            @if(is_array($puertas) && sizeof($puertas) > 0 || is_array($ventanas) && sizeof($ventanas) > 0)
            <hr class="dotted">
            <div class="m-wrap">
                <table id="tableTriangular" class="table-calculator">
                    @if(is_array($puertas) and sizeof($puertas) > 0)
                    @foreach($puertas as $p)
                    <tr>
                        <td class="first-line">{{ $p->nombre }}</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($p->ancho, 2, ',', '') }}"> mts</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($p->ancho, 2, ',', '') }}"> mts</td>
                    </tr>
                    @endforeach
                    @endif
                    @if(is_array($ventanas) and sizeof($ventanas) > 0)
                    @foreach($ventanas as $v)
                    <tr>
                        <td class="first-line">{{ $v->nombre }}</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($v->alto, 2, ',', '') }}"> mts</td>
                        <td class="oline"><input type="text" class="input_text"
                                value="{{ number_format($v->ancho, 2, ',', '') }}"> mts</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
            @endif
            @if(is_array($perfiles) and sizeof($perfiles) > 0)
            <hr class="dotted">
            <div class="m-wrap">
                <table class="table-esquinas">
                    <tr>
                        <th></th>
                        <th>Cantidad</th>
                    </tr>
                    <tr>
                        <td>Externas</td>
                        <td class="oline"><input type="number" class="input_text"
                                value="{{ $perfiles[0]->cantExternas }}"></td>
                    </tr>
                    <tr>
                        <td>Internas</td>
                        <td class="oline"><input type="number" class="input_text"
                                value="{{ $perfiles[0]->cantInternas }}"></td>
                    </tr>
                    <tr>
                        <td>Cierre lateral</td>
                        <td class="oline"><input type="number" class="input_text"
                                value="{{ $perfiles[0]->cantCierreLateral }}"></td>
                    </tr>
                </table>
            </div>
            @endif
        </div>

        <hr style="margin-bottom: 0px;margin-top:30px;">
        <div class="m-wrap">
            <div class="total-row" style="text-align: right;">
                <p>TOTAL</p>
                <div class="divider-dotted"></div>
                <p class="total-mt">
                    <let id="totalMts">{{ number_format($mt2, 2, ',', '') }}</let> mts
                </p>
            </div>
        </div>
        <hr style="margin-bottom: 16px;">

        <div>
            <p style="font-size:12px;">
                El resultado de cantidad de materiales a utilizar que recibirá a través de esta herramienta se basa en
                la información provista manualmente por usted y en base a geometrías estándar y mejores prácticas.
                <br>
                Por favor, evaluar los datos informados y, ante cualquier inquietud o necesidad de mayor información,
                contáctenos a contacto.cl@etexgroup.com.
            </p>
        </div>

        <div class="select-group">
            <div class="row">
                <div class="col-md-12">

                    <div class="pretty p-image p-plain">
                        <input type="checkbox" id="descargar_resultado" />
                        <div class="state">
                            <img class="image" src="{{ asset('img/checkbox.svg') }}">
                            <label>Descargar el resultado</label>
                        </div>
                    </div>

                    <div class="pretty p-image p-plain">
                        <input type="checkbox" id="enviar_email" />
                        <div class="state">
                            <img class="image" src="{{ asset('img/checkbox.svg') }}">
                            <label>Enviar a mi mail el resultado</label>
                        </div>
                    </div>

                    <div class="pretty p-image p-plain">
                        <input type="checkbox" id="contactar_instalador" />
                        <div class="state">
                            <img class="image" src="{{ asset('img/checkbox.svg') }}">
                            <label>Contactar a un instalador</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center mt62 p0 buttons-container">
                <div class="item item-1">
                    <a href="{{ asset('/paso2/') }}/{{ $codigo }}" class="big-gray-btn">Volver al <br> paso anterior</a>
                </div>
                <div class="item">
                    <a href="{{ asset('/completar-formulario') }}/{{ $codigo }}" id="btnFinalizar" class="big-orange-btn">Siguiente</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('js/paso3.js') }}"></script>
@endsection
