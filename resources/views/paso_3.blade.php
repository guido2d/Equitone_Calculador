@extends('layouts.main') @section('contenido')

<section class="pasos" id="paso2">
    <div class="container">
        <hr>
        <!--FACHADAS-->
        <div class="row">
            <div class="m-wrap">
                <div class="col-md-12 p0 mt20">
                    <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                    <h4 class="table_title">Resultados</h4>
                </div>
                <table id="tableFachada" class="table-calculator">
                    <tr>
                        <th></th>
                        <th>Alto</th>
                        <th>Ancho</th>
                    </tr>
                    <tr>
                        <td class="first-line">Fachada principal</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                    </tr>
                    <tr>
                        <td class="first-line">Fachada nro. 2</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                    </tr>
                    <tr>
                        <td class="first-line">Fachada - triangular</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                    </tr>
                </table>
            </div>
            <hr class="dotted">
            <div class="m-wrap">
                <table id="tableTriangular" class="table-calculator">
                    <tr>
                        <td class="first-line">Puerta</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                    </tr>
                    <tr>
                        <td class="first-line">Puerta</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                    </tr>
                    <tr>
                        <td class="first-line">Ventana</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                        <td class="oline"><input type="text" class="input_text" value="0"> mts</td>
                    </tr>
                </table>
            </div>
            <hr class="dotted">
            <div class="m-wrap">
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

        <hr style="margin-bottom: 0px;margin-top:30px;">
        <div class="m-wrap">
            <div class="total-row" style="text-align: right;">
                <p>TOTAL</p>
                <div class="divider-dotted"></div>
                <p class="total-mt">
                    <let id="totalMts">100.456</let> mts</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12 text-center mt62 p0">
                <a href="{{ asset('/paso2?tipo=rebestimiento') }}" class="big-gray-btn">Volver al <br> paso anterior</a>
                <a href="{{ asset('/') }}" class="big-gray-btn">Descargue el resultado</a>
                <a href="#" class="big-orange-btn">Necesita un <br>instalador?</a>
            </div>
        </div>
    </div>
</section>

@endsection
