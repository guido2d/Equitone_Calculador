@extends('layouts.main') 
@section('contenido')

<!-- PROGRESS BAR -->
<div class="site__form-header">
    <!-- progressbar -->
    <ul id="progressbar">
        <a href="{{ route('step.2') }}" class="previous action-button back-arrow">
            <img src="{{ asset('/img/icons/Icono-regresar.png') }}" alt="" width="20">
        </a>
        <li class="active">
            1
        </li>
        <li class="active">
            2
        </li>
        <li class="active">
            3
        </li>
        <li>
            4
        </li>
        <li>
            5
        </li>
        <a href="" class="previous action-button close-form">
            <img src="{{ asset('/img/icons/Icono-Cerrar.png') }}" alt="" width="20">
        </a>
    </ul>
</div>

<section class="pasos" id="paso2">
    <div class="container">

        <hr style="margin-bottom: 0px;">
        <div class="m-wrap">
            <div class="total-row">
                <p>TOTAL</p>
                <div class="divider-dotted"></div>
                <p class="total-mt"><let class="totalMts">0,00</let> mts<sup>2</sup> </p>
            </div>
        </div>
        <hr>
        <!--FACHADAS-->
        <div class="row fachadas">
            <div class="m-wrap">
                <div class="col-md-12 p0 mt20">
                    <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                    <h4 class="table_title"><let class="primary">Fachadas</let> a revestir
                        <let class="light">(Superficie y diseño)</let>
                    </h4>
                </div>
                <table id="tableFachada" class="table-calculator">
                    <tr>
                        <th></th>
                        <th>Alto</th>
                        <th>Ancho</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td class="first-line"><img src="img/icons/rectangular.svg"> Fachada principal</td>
                        <td class="oline"><input type="text" class="input_text alto" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                        <td class="oline"><input type="text" class="input_text ancho" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                        <td class="plus plus-fachada tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra fachada a revestir.</span></td>
                    </tr>
                </table>
            </div>
            <hr class="dotted">
            <div class="m-wrap">
                <table id="tableTriangular" class="table-calculator">
                    <tr>
                        <td class="first-line"><img src="img/icons/triangular.svg" alt=""> Fachada - triangular</td>
                        <td class="oline"><input type="text" class="input_text alto" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                        <td class="oline"><input type="text" class="input_text ancho" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                        <td class="plus plus-triangular tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra fachada triangular.</span></td>
                    </tr>
                </table>
            </div>
        </div>

        <!--BOTONES-->
        <div class="row">
            <div class="large-button">
                <h3>¿Las superficies a revestir poseen puertas o ventanas?</h3>
                <div class="btn-container">
                    <a href="#" class="gray-btn" id="btnPVSi">Si</a>
                    <a href="#" class="gray-btn" id="btnPVNo">No</a>
                </div>
            </div>

            <section id="puertasyventanas">
                <div class="m-wrap">
                    <div class="col-md-12 p0 mt20">
                        <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                        <h4 class="table_title"><let class="primary">Vanos</let>
                            <let class="light">(Puertas y Ventanas)</let>
                        </h4>
                    </div>
                    <table id="tablePuertas" class="table-calculator">
                        <tr>
                            <th></th>
                            <th>Alto</th>
                            <th>Ancho</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td class="first-line"><img src="img/icons/puertas.svg" alt=""> Puerta</td>
                            <td class="oline"><input type="text" class="input_text alto puerta" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                            <td class="oline"><input type="text" class="input_text ancho puerta" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                            <td class="plus plus-puertas tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra puerta.</span></td>
                        </tr>
                    </table>
                </div>
                <hr class="dotted">
                <div class="m-wrap">
                    <table id="tableVentanas" class="table-calculator">
                        <tr>
                            <td class="first-line"><img src="img/icons/ventanas.svg" alt=""> Ventana</td>
                            <td class="oline"><input type="text" class="input_text alto ventana" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                            <td class="oline"><input type="text" class="input_text ancho ventana" placeholder="0,00" onkeypress="return check(event)"> mts</td>
                            <td class="plus plus-ventana tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra ventana.</span></td>
                        </tr>
                    </table>
                </div>
            </section>

            <div class="large-button">
                <h3>¿Quiere utilizar perfiles de inicio y terminación?</h3>
                <div class="btn-container">
                    <a href="#" class="gray-btn" id="btnPerfilesSi">Si</a>
                    <a href="#" class="gray-btn" id="btnPerfilesNo">No</a>
                </div>
            </div>

            <section id="perfiles">
                <div class="m-wrap">
                    <div class="col-md-12 p0 mt20">
                        <img src="img/fachada_revestir.png" alt="" style="position: absolute;top: 1px;">
                        <h4 class="table_title"><let class="primary">Esquinas de inicio y terminación</let>
                            <let class="light">(Externas, Internas y Cierre lateral)</let>
                        </h4>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-3 p0">
                            <img src="img/esquinas.png" alt="">
                        </div> -->
                        <div class="col-md-12">
                            <table id="tableEsquinas" class="table-esquinas">
                                <tr>
                                    <th></th>
                                    <th>Cantidad</th>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('/img/icons/Icono-Corner-External.png') }}" alt="" width="50" />
                                        Externas
                                    </td>
                                    <td class="oline"><input type="number" class="input_text" id="cantExternas" value="0" min="0"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('/img/icons/Icono-Corner-Internal.png') }}" alt="" width="50" />
                                        Internas
                                    </td>
                                    <td class="oline"><input type="number" class="input_text" id="cantInternas" value="0" min="0"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('/img/icons/Icono-Cierre-Lateral.png') }}" alt="" width="50" />
                                        Cierre lateral
                                    </td>
                                    <td class="oline"><input type="number" class="input_text" id="cantCierreLateral" value="0" min="0"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <hr style="margin-bottom: 0px;margin-top:30px;">
        <div class="m-wrap">
            <div class="total-row">
                <p>TOTAL</p>
                <div class="divider-dotted"></div>
                <p class="total-mt">
                    <let class="totalMts">0,00</let> mts<sup>2</sup></p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12 text-center mt62 p0">
                <a href="{{ asset('/paso3') }}" id="btnCalcular" class="big-orange-btn">Siguiente</a>
            </div>
        </div>
    </div>
</section>

@endsection 
@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('js/calculador.js?v=2.5') }}"></script>
@endsection
