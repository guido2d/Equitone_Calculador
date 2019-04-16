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
                    <let class="totalMts">{{ number_format($mt2, 2, '.', '') }}</let> mts<sup>2</sup> </p>
            </div>
        </div>
        <hr>
        <!--FACHADAS-->
        <div class="row fachadas">
            <div class="m-wrap">
                <div class="col-md-12 p0 mt20">
                    <img src="{{ asset('img/fachada_revestir.png') }}" alt="" style="position: absolute;top: 1px;">
                    <h4 class="table_title">Fachadas a revestir
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
                    @if(is_array($fachadas_rectangulares) and sizeof($fachadas_rectangulares) > 0) @foreach($fachadas_rectangulares as $fc)
                    <tr>
                        <td class="first-line"><img src="{{ asset('img/icons/rectangular.svg') }}"> {{ $fc->nombre }}</td>
                        <td class="oline"><input type="number" class="input_text alto" placeholder="0.00" value="{{ $fc->alto }}"> mts</td>
                        <td class="oline"><input type="number" class="input_text ancho" placeholder="0.00" value="{{ $fc->ancho }}"> mts</td>
                        @if($loop->first)
                        <td class="plus plus-fachada tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra fachada a revestir.</span></td>
                        @else
                        <td class='less' onclick='quitarElement(this,"rectangular")'>-</td>
                        @endif
                    </tr>
                    @endforeach @else
                    <tr>
                        <td class="first-line"><img src="{{ asset('img/icons/rectangular.svg') }}"> Fachada principal</td>
                        <td class="oline"><input type="number" class="input_text alto" placeholder="0.00"> mts</td>
                        <td class="oline"><input type="number" class="input_text ancho" placeholder="0.00"> mts</td>
                        <td class="plus plus-fachada tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra fachada a revestir.</span></td>
                    </tr>
                    @endif
                </table>
            </div>
            <hr class="dotted">
            <div class="m-wrap">
                <table id="tableTriangular" class="table-calculator">
                    @if(is_array($fachadas_triangulares) and sizeof($fachadas_triangulares) > 0) @foreach($fachadas_triangulares as $ft)
                    <tr>
                        <td class="first-line"><img src="{{ asset('img/icons/triangular.svg') }}" alt=""> {{ $ft->nombre }}</td>
                        <td class="oline"><input type="number" class="input_text alto" placeholder="0.00" value="{{ $ft->alto }}"> mts</td>
                        <td class="oline"><input type="number" class="input_text ancho" placeholder="0.00" value="{{ $ft->ancho }}"> mts</td>
                        @if($loop->first)
                        <td class="plus plus-triangular tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra fachada triangular.</span></td>
                        @else
                        <td class='less' onclick='quitarElement(this,"triangular")'>-</td>
                        @endif
                    </tr>
                    @endforeach @else
                    <tr>
                        <td class="first-line"><img src="{{ asset('img/icons/triangular.svg') }}" alt=""> Fachada - triangular</td>
                        <td class="oline"><input type="number" class="input_text alto" placeholder="0.00"> mts</td>
                        <td class="oline"><input type="number" class="input_text ancho" placeholder="0.00"> mts</td>
                        <td class="plus plus-triangular tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra fachada triangular.</span></td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <!--BOTONES-->
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
                        <img src="{{ asset('img/fachada_revestir.png') }}" alt="" style="position: absolute;top: 1px;">
                        <h4 class="table_title">Vanos
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
                        @if(is_array($puertas) and sizeof($puertas) > 0) @foreach($puertas as $p)
                        <tr>
                            <td class="first-line"><img src="{{ asset('img/icons/puertas.svg') }}" alt=""> {{ $p->nombre }}</td>
                            <td class="oline"><input type="text" class="input_text alto puerta" placeholder="0.00" value="{{ $p->alto }}"> mts</td>
                            <td class="oline"><input type="text" class="input_text ancho puerta" placeholder="0.00" value="{{ $p->ancho }}"> mts</td>
                            @if($loop->first)
                            <td class="plus plus-puertas tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra puerta.</span></td>
                            @else
                            <td class="less" onclick="quitarElement(this)">-</td>
                            @endif
                        </tr>
                        @endforeach @else
                        <tr>
                            <td class="first-line"><img src="{{ asset('img/icons/puertas.svg') }}" alt=""> Puerta</td>
                            <td class="oline"><input type="number" class="input_text alto puerta" placeholder="0.00"> mts</td>
                            <td class="oline"><input type="number" class="input_text ancho puerta" placeholder="0.00"> mts</td>
                            <td class="plus plus-puertas tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra puerta.</span></td>
                        </tr>
                        @endif
                    </table>
                </div>
                <hr class="dotted">
                <div class="m-wrap">
                    <table id="tableVentanas" class="table-calculator">
                        @if(is_array($ventanas) and sizeof($ventanas) > 0) @foreach($ventanas as $v)
                        <tr>
                            <td class="first-line"><img src="{{ asset('img/icons/ventanas.svg') }}" alt=""> {{ $v->nombre }}</td>
                            <td class="oline"><input type="text" class="input_text alto ventana" placeholder="0.00" value="{{ $v->alto }}"> mts</td>
                            <td class="oline"><input type="text" class="input_text ancho ventana" placeholder="0.00" value="{{ $v->ancho }}"> mts</td>
                            @if($loop->first)
                            <td class="plus plus-ventana tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra ventana.</span></td>
                            @else
                            <td class="less" onclick="quitarElement(this)">-</td>
                            @endif
                        </tr>
                        @endforeach @else
                        <tr>
                            <td class="first-line"><img src="{{ asset('img/icons/ventanas.svg') }}" alt=""> Ventana</td>
                            <td class="oline"><input type="number" class="input_text alto ventana" placeholder="0.00"> mts</td>
                            <td class="oline"><input type="number" class="input_text ancho ventana" placeholder="0.00"> mts</td>
                            <td class="plus plus-ventana tooltip">+<span class="tooltiptext">Click aquí si quiere agregar otra ventana.</span></td>
                        </tr>
                        @endif
                    </table>
                </div>
            </section>

            <div class="large-button">
                <h3>Quiere utilizar perfiles de inicio y terminación?</h3>
                <div class="btn-container">
                    <a href="#" class="orange-btn" id="btnPerfilesSi">Si</a>
                    <a href="#" class="gray-btn" id="btnPerfilesNo">No</a>
                </div>
            </div>

            <section id="perfiles">
                <div class="m-wrap">
                    <div class="col-md-12 p0 mt20">
                        <img src="{{ asset('img/fachada_revestir.png') }}" alt="" style="position: absolute;top: 1px;">
                        <h4 class="table_title">Esquinas de inicio y terminación
                            <let class="light">(Externas, Internas y Cierre lateral)</let>
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3 p0">
                            <img src="{{ asset('img/esquinas.png') }}" alt="">
                        </div>
                        <div class="col-md-8">
                            <table class="table-esquinas">
                                <tr>
                                    <th></th>
                                    <th>Cantidad</th>
                                </tr>
                                @if(is_array($perfiles) and sizeof($perfiles) > 0)
                                <tr>
                                    <td>Externas</td>
                                    <td class="oline"><input type="number" class="input_text" id="cantExternas" value="{{ $perfiles[0]->cantExternas }}"></td>
                                </tr>
                                <tr>
                                    <td>Internas</td>
                                    <td class="oline"><input type="number" class="input_text" id="cantInternas" value="{{ $perfiles[0]->cantInternas }}"></td>
                                </tr>
                                <tr>
                                    <td>Cierre lateral</td>
                                    <td class="oline"><input type="number" class="input_text" id="cantCierreLateral" value="{{ $perfiles[0]->cantCierreLateral }}"></td>
                                </tr>
                                @else
                                <tr>
                                    <td>Externas</td>
                                    <td class="oline"><input type="number" class="input_text" id="cantExternas" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Internas</td>
                                    <td class="oline"><input type="number" class="input_text" id="cantInternas" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Cierre lateral</td>
                                    <td class="oline"><input type="number" class="input_text" id="cantCierreLateral" value="0"></td>
                                </tr>
                                @endif
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
                    <let class="totalMts">{{ number_format($mt2, 2, '.', '') }}</let> mts<sup>2</sup></p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12 text-center mt62 p0">
                <a href="{{ asset('/') }}" class="big-gray-btn">Volver</a>
                <a href="{{ asset('/paso3') }}" id="btnCalcular" class="big-orange-btn">Calcular</a>
            </div>
        </div>
    </div>
</section>

@endsection @section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    var cantFachadas = @if(is_array($fachadas_rectangulares)) {{ sizeof($fachadas_rectangulares) }} @else 1 @endif;
    var cantFachadasTriangulares = @if(is_array($fachadas_triangulares)) {{ sizeof($fachadas_triangulares) }} @else 1 @endif;
    var mt2aRevestir = {{ number_format($mt2, 2, '.', '') }};
    var perfilBase = {{ number_format($perfilBase, 2, '.', '') }};
    var perfilJ = {{ number_format($perfilJ, 2, '.', '') }};
    var perfilL = {{ number_format($perfilL, 2, '.', '') }};
    var perfilCortagotera = {{ number_format($perfilCortagotera, 2, '.', '') }};

    $(document).ready(function() {

        $('#btnPVSi').on('click', function(e) {
            e.preventDefault();
            $("#puertasyventanas").slideDown();
        });

        $('#btnPVNo').on('click', function(e) {
            e.preventDefault();
            $("#puertasyventanas").slideUp();
            $('#puertasyventanas .input_text').each(function(index, element) {
                $(this).val("");
            });
            calcularTotal();
        });

        $('#btnPerfilesSi').on('click', function(e) {
            e.preventDefault();
            $("#perfiles").slideDown();
        });

        $('#btnPerfilesNo').on('click', function(e) {
            e.preventDefault();
            $("#perfiles").slideUp();
        });

        $('.plus-fachada').on('click', function(e) {
            if (cantFachadas <= 3) {
                var img = "{{asset('/img/icons/rectangular.svg') }}";
                var trPuertas = '<tr>';
                trPuertas += '<td class="first-line"><img src="' + img + '" alt=""> Fachada nro. ' + (cantFachadas + 1) + '</td>';
                trPuertas += '<td class="oline"><input type="number" class="input_text alto test123" placeholder="0.00"> mts</td>';
                trPuertas += '<td class="oline"><input type="number" class="input_text ancho" placeholder="0.00"> mts</td>';
                trPuertas += "<td class='less' onclick='quitarElement(this,\"rectangular\")'>-</td>";
                trPuertas += '</tr>';
                $('#tableFachada').append(trPuertas);
                cantFachadas += 1;
            } else {
                Swal.fire({
                    text: 'Puede seleccionar un máximo de 4 fachadas rectangulares.',
                    type: 'info',
                    confirmButtonText: 'Ok'
                })
            }
        });

        $('.plus-triangular').on('click', function(e) {
            if (cantFachadasTriangulares <= 1) {
                var img = "{{asset('/img/icons/triangular.svg') }}";
                var trPuertas = '<tr>';
                trPuertas += '<td class="first-line"><img src="' + img + '" alt=""> Fachada - triangular</td>';
                trPuertas += '<td class="oline"><input type="number" class="input_text alto" placeholder="0.00"> mts</td>';
                trPuertas += '<td class="oline"><input type="number" class="input_text ancho" placeholder="0.00"> mts</td>';
                trPuertas += "<td class='less' onclick='quitarElement(this,\"triangular\")'>-</td>";;
                trPuertas += '</tr>';
                $('#tableTriangular').append(trPuertas);
                cantFachadasTriangulares += 1;
            } else {
                Swal.fire({
                    text: 'Puede seleccionar un máximo de 2 fachadas triangulares.',
                    type: 'info',
                    confirmButtonText: 'Ok'
                })
            }
        });

        $('.plus-puertas').on('click', function(e) {
            var img = "{{asset('/img/icons/puertas.svg') }}";
            var trPuertas = '<tr>';
            trPuertas += '<td class="first-line"><img src="' + img + '" alt=""> Puerta</td>';
            trPuertas += '<td class="oline"><input type="number" class="input_text alto puerta" placeholder="0.00"> mts</td>';
            trPuertas += '<td class="oline"><input type="number" class="input_text ancho puerta" placeholder="0.00"> mts</td>';
            trPuertas += '<td class="less" onclick="quitarElement(this)">-</td>';
            trPuertas += '</tr>';
            $('#tablePuertas').append(trPuertas);
        });

        $('.plus-ventana').on('click', function(e) {
            var img = "{{asset('/img/icons/ventanas.svg') }}";
            var trPuertas = '<tr>';
            trPuertas += '<td class="first-line"><img src="' + img + '" alt=""> Ventana</td>';
            trPuertas += '<td class="oline"><input type="number" class="input_text alto ventana" placeholder="0.00"> mts</td>';
            trPuertas += '<td class="oline"><input type="number" class="input_text ancho ventana" placeholder="0.00"> mts</td>';
            trPuertas += '<td class="less" onclick="quitarElement(this)">-</td>';
            trPuertas += '</tr>';
            $('#tableVentanas').append(trPuertas);
        });

        $('.fachadas').on('change', '.input_text', function(e) {
            calcularTotal();
        });

        $('#puertasyventanas').on('change', '.input_text', function() {
            calcularTotal();
        });

        $('#btnCalcular').on('click', function(e) {
            e.preventDefault();

            var arrFachadas = new Array();
            var arrFachadasTriangulares = new Array();
            var arrPuertas = new Array();
            var arrVentanas = new Array();
            var arrPerfiles = new Array();
            var saltos = 0;

            $('#tableFachada .input_text').each(function(index, element) {
                var nombre = "";
                var alto = 0;
                var ancho = 0;

                if (saltos == 0) {
                    nombre = "Fachada Principal";
                } else {
                    nombre = "Fachada nro. " + (saltos + 1);
                }

                if ($(this).hasClass('alto')) {
                    alto = $(this).val();
                    ancho = $(this).parent().next().children(':first-child').val();

                    if (alto > 0 && ancho > 0) {
                        arrFachadas.push({
                            "nombre": nombre,
                            "alto": alto,
                            "ancho": ancho
                        });
                    }

                    saltos += 1;
                }
            });

            $('#tableTriangular .input_text').each(function(index, element) {
                var alto = 0;
                var ancho = 0;

                if ($(this).hasClass('alto')) {
                    alto = $(this).val();
                    ancho = $(this).parent().next().children(':first-child').val();

                    if (alto > 0 && ancho > 0) {
                        arrFachadasTriangulares.push({
                            "nombre": "Fachada - triangular",
                            "alto": alto,
                            "ancho": ancho
                        });
                    }
                }
            });

            if ($("#puertasyventanas").is(":visible")) {

                $('#tablePuertas .input_text').each(function(index, element) {
                    var alto = 0;
                    var ancho = 0;

                    if ($(this).hasClass('alto')) {
                        alto = $(this).val();
                        ancho = $(this).parent().next().children(':first-child').val();

                        if (alto > 0 && ancho > 0) {
                            arrPuertas.push({
                                "nombre": "Puerta",
                                "alto": alto,
                                "ancho": ancho
                            });
                        }
                    }
                });

                $('#tableVentanas .input_text').each(function(index, element) {
                    var alto = 0;
                    var ancho = 0;

                    if ($(this).hasClass('alto')) {
                        alto = $(this).val();
                        ancho = $(this).parent().next().children(':first-child').val();

                        if (alto > 0 && ancho > 0) {
                            arrVentanas.push({
                                "nombre": "Ventana",
                                "alto": alto,
                                "ancho": ancho
                            });
                        }
                    }
                });
            }

            if ($('#perfiles').is(":visible")) {
                var cantExternas = $('#cantExternas').val();
                var cantInternas = $('#cantInternas').val();
                var cantCierreLateral = $('#cantCierreLateral').val();

                arrPerfiles.push({
                    "cantExternas": cantExternas,
                    "cantInternas": cantInternas,
                    "cantCierreLateral": cantCierreLateral
                });
            }

            $.ajax({
                type: 'post',
                url: '/guardarCalculo',
                data: {
                    codigo: "{{ $codigo }}",
                    fachadas_rectangulares: arrFachadas,
                    fachadas_triangulares: arrFachadasTriangulares,
                    puertas: arrPuertas,
                    ventanas: arrVentanas,
                    perfiles: arrPerfiles,
                    mt2aRevestir: mt2aRevestir,
                    perfilBase: perfilBase,
                    perfilL: perfilL,
                    perfilJ: perfilJ,
                    perfilCortagotera: perfilCortagotera,
                },
                success: function(data) {
                    window.location.href = "/resultados/" + data;
                },
                error: function(request, status, error) {
                    alert(jQuery.parseJSON(request.responseText).Message);
                }
            });

        });

        var puertas = @if(is_array($puertas))
        "{{ sizeof($puertas) }}"
        @else 0 @endif;
        var ventanas = @if(is_array($ventanas))
        "{{ sizeof($ventanas) }}"
        @else 0 @endif;
        var perfiles = @if(is_array($perfiles))
        "{{ sizeof($perfiles) }}"
        @else 0 @endif;

        if (puertas > 0 || ventanas > 0) {
            $("#puertasyventanas").slideDown();
        }

        if (perfiles > 0) {
            $("#perfiles").slideDown();
        }

    });

    function quitarElement(obj, tipo) {
        obj.closest('tr').remove();
        if (tipo == 'rectangular') {
            cantFachadas -= 1;
        }
        if (tipo == 'triangular') {
            cantFachadasTriangulares -= 1;
        }
        calcularTotal();
    }

    function calcularConAlto(obj) {
        var alto = obj.val();
        var ancho = obj.parent().next().children(':first-child').val();
        if (isNaN(ancho) || ancho == "") {
            ancho = 0;
        }
        if (isNaN(alto) || alto == "") {
            alto = 0;
        }
        return parseFloat(alto) * parseFloat(ancho);
    }

    function calcularConAncho(obj) {
        var ancho = obj.val();
        var alto = obj.parent().prev().children(':first-child').val();
        if (isNaN(alto) || alto == "") {
            alto = 0;
        }
        if (isNaN(ancho) || ancho == "") {
            ancho = 0;
        }
        return parseFloat(alto) * parseFloat(ancho);
    }
    
    function calcularConAltoTriangular(obj){
        var alto = obj.val();
        var ancho = obj.parent().next().children(':first-child').val();
        if (isNaN(ancho) || ancho == "") {
            ancho = 0;
        }
        if (isNaN(alto) || alto == "") {
            alto = 0;
        }
        return (parseFloat(alto) * parseFloat(ancho)) / 2;
    }

    function calcularTotal() {

        mt2aRevestir = calcularMtsARevestir();

        if (mt2aRevestir < 0) {
            Swal.fire({
                text: 'La superficie a revestir no puede ser negativa.',
                type: 'error',
                confirmButtonText: 'Ok'
            });
            mt2aRevestir = 0;
        }

        $('.totalMts').text("");
        $('.totalMts').text(mt2aRevestir.toFixed(2));

        perfilBase = calcularPerfilBase();
    }

    function calcularMtsARevestir() {
        var mt2Fachada = 0;
        var mt2FachadaTriangular = 0;
        var mt2Vanos = 0;
        var rta = 0;

        $('#tableFachada .input_text.alto').each(function (index, element) {
            mt2Fachada += calcularConAlto($(this));
        });

        $('#tableTriangular .input_text.alto').each(function (index, element) {
            mt2FachadaTriangular += calcularConAltoTriangular($(this));
        });

        $('#puertasyventanas .input_text.alto').each(function (index, element) {
            mt2Vanos += calcularConAlto($(this));
        });

        rta = (parseFloat(mt2Fachada) + parseFloat(mt2FachadaTriangular)) - parseFloat(mt2Vanos);
        return rta;
    }

    function calcularPerfilBase() {
        var anchoFachadasTotal = 0;
        var anchoFachadas = 0;
        var anchoVentanasTotal = 0;
        var anchoVentanas = 0;
        var total = 0;

        $('.fachadas .input_text.ancho').each(function(index, element) {
            anchoFachadas = $(this).val();
            if (isNaN(anchoFachadas) || anchoFachadas == "") {
                anchoFachadas = 0;
            }
            anchoFachadasTotal += parseFloat(anchoFachadas);
        });

        $('#puertasyventanas .input_text.ancho.ventana').each(function(index, element) {
            anchoVentanas = $(this).val();
            if (isNaN(anchoVentanas) || anchoVentanas == "") {
                anchoVentanas = 0;
            }
            anchoVentanasTotal += parseFloat(anchoVentanas);
        });

        total = (anchoFachadasTotal + anchoVentanasTotal);

        return total;
    }

    function calcularPerfilJyL() {
        var esquinasExternas = $('#cantExternas').val();
        var esquinasInternas = $('#cantInternas').val();
        var cierreLateral = $('#cantCierreLateral').val();
        var altoFachadaPrincipal = $('#tableFachada .input_text.alto:first').val();
        var altoVentana1 = $('#tableVentanas .input_text.alto:first').val();
        var perfilExterno = parseFloat(altoFachadaPrincipal) * parseInt(esquinasExternas);
        var perfilInterno = parseFloat(altoFachadaPrincipal) * parseInt(esquinasInternas);
        var perfilCierreLateral = parseFloat(altoFachadaPrincipal) * parseInt(cierreLateral);
        var perfilJ1x2 = parseFloat(altoVentana1) * 2;
        var perfilJF1 = (parseFloat(perfilExterno) * 2) + (parseFloat(perfilInterno) * 2) + parseFloat(perfilCierreLateral) + parseFloat(perfilJ1x2);
        var altoRestoVentanas = 0;
        $('#tableVentanas tr').find('.input_text.alto').each(function(index, element) {
            var alto = $(this).val();
            if (isNaN(alto) || alto == "") {
                alto = 0;
            }
            altoRestoVentanas += parseFloat(alto) * 2;
        });
        altoRestoVentanas -= perfilJ1x2;
        perfilJ = parseFloat(perfilJF1) + parseFloat(altoRestoVentanas);
        perfilL = perfilExterno;
    }

    function calcularPerfilCortagotera() {
        var anchoVentanas = 0;
        $('#tableVentanas tr').find('.input_text.ancho').each(function(index, element) {
            var ancho = $(this).val();
            if (isNaN(ancho) || ancho == "") {
                ancho = 0;
            }
            anchoVentanas += parseFloat(ancho);
        });
        perfilCortagotera = anchoVentanas;
    }

</script>
@endsection
