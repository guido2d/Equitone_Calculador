@extends('layouts.main') @section('contenido')

<section class="pasos" id="paso2">
    <div class="container">
        <hr>
        <!--FACHADAS-->
        <div class="row">
            <div class="m-wrap">
                <div class="col-md-12 p0 mt20">
                    <img src="{{ asset('img/fachada_revestir.png') }}" alt="" style="position: absolute;top: 1px;">
                    <h4 class="table_title">Resultados</h4>
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
                            <td class="oline"><input type="text" class="input_text" value="{{ $fc->alto }}"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $fc->ancho }}"> mts</td>
                        </tr>
                        @endforeach
                    @endif
                    
                    @if(is_array($fachadas_triangulares) and sizeof($fachadas_triangulares) > 0)
                        @foreach($fachadas_triangulares as $ft)
                        <tr>
                            <td class="first-line">{{ $ft->nombre }}</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $ft->alto }}"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $ft->ancho }}"> mts</td>
                        </tr>
                        @endforeach
                    @endif
                    
                </table>
            </div>
            @if(is_array($puertas) and sizeof($puertas) > 0 || is_array($ventanas) and sizeof($ventanas) > 0)
            <hr class="dotted">
            <div class="m-wrap">
                <table id="tableTriangular" class="table-calculator">
                    @if(is_array($puertas) and sizeof($puertas) > 0)
                        @foreach($puertas as $p)    
                        <tr>
                            <td class="first-line">{{ $p->nombre }}</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $p->alto }}"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $p->ancho }}"> mts</td>
                        </tr>
                        @endforeach
                    @endif
                    @if(is_array($ventanas) and sizeof($ventanas) > 0)
                        @foreach($ventanas as $v)
                        <tr>
                            <td class="first-line">{{ $v->nombre }}</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $v->alto }}"> mts</td>
                            <td class="oline"><input type="text" class="input_text" value="{{ $v->ancho }}"> mts</td>
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
                        <td class="oline"><input type="number" class="input_text" value="{{ $perfiles[0]->cantExternas }}"></td>
                    </tr>
                    <tr>
                        <td>Internas</td>
                        <td class="oline"><input type="number" class="input_text" value="{{ $perfiles[0]->cantInternas }}"></td>
                    </tr>
                    <tr>
                        <td>Cierre lateral</td>
                        <td class="oline"><input type="number" class="input_text" value="{{ $perfiles[0]->cantCierreLateral }}"></td>
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
                    <let id="totalMts">{{ number_format($mt2, 2, '.', '') }}</let> mts</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12 text-center mt62 p0">
                <a href="{{ asset('/paso2/') }}/{{ $codigo }}" class="big-gray-btn">Volver al <br> paso anterior</a>
                <a href="{{ asset('/descargar-pdf') }}/{{ $codigo }}" class="big-gray-btn">Descargue el resultado</a>
                <a href="#" class="big-orange-btn">Necesita un <br>instalador?</a>
            </div>
        </div>
    </div>
</section>

@endsection
