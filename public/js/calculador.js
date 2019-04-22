var cantFachadas = 1;
var cantFachadasTriangulares = 1;
var mt2aRevestir = 0;
var perfilBase = 0;
var perfilJ = 0;
var perfilL = 0;
var perfilCortagotera = 0;

$(document).ready(function () {

    $('#btnPVSi').on('click', function (e) {
        e.preventDefault();
        $("#puertasyventanas").slideDown();
    });

    $('#btnPVNo').on('click', function (e) {
        e.preventDefault();
        $("#puertasyventanas").slideUp();
        $('#puertasyventanas .input_text').each(function (index, element) {
            $(this).val("");
        });
        calcularTotal();
    });

    $('#btnPerfilesSi').on('click', function (e) {
        e.preventDefault();
        $("#perfiles").slideDown();
    });

    $('#btnPerfilesNo').on('click', function (e) {
        e.preventDefault();
        $("#perfiles").slideUp();
    });

    $('.plus-fachada').on('click', function (e) {
        if (cantFachadas <= 3) {
            var trPuertas = '<tr>';
            trPuertas += '<td class="first-line"><img src="img/icons/rectangular.svg" alt=""> Fachada nro. ' + (cantFachadas + 1) + '</td>';
            trPuertas += '<td class="oline"><input type="text" class="input_text alto" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
            trPuertas += '<td class="oline"><input type="text" class="input_text ancho" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
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

    $('.plus-triangular').on('click', function (e) {
        if (cantFachadasTriangulares <= 1) {
            var trPuertas = '<tr>';
            trPuertas += '<td class="first-line"><img src="img/icons/triangular.svg" alt=""> Fachada - triangular</td>';
            trPuertas += '<td class="oline"><input type="text" class="input_text alto" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
            trPuertas += '<td class="oline"><input type="text" class="input_text ancho" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
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

    $('.plus-puertas').on('click', function (e) {
        var trPuertas = '<tr>';
        trPuertas += '<td class="first-line"><img src="/img/icons/puertas.svg" alt=""> Puerta</td>';
        trPuertas += '<td class="oline"><input type="text" class="input_text alto puerta" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
        trPuertas += '<td class="oline"><input type="text" class="input_text ancho puerta" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
        trPuertas += '<td class="less" onclick="quitarElement(this)">-</td>';
        trPuertas += '</tr>';
        $('#tablePuertas').append(trPuertas);
    });

    $('.plus-ventana').on('click', function (e) {
        var trPuertas = '<tr>';
        trPuertas += '<td class="first-line"><img src="/img/icons/ventanas.svg" alt=""> Ventana</td>';
        trPuertas += '<td class="oline"><input type="text" class="input_text alto ventana" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
        trPuertas += '<td class="oline"><input type="text" class="input_text ancho ventana" placeholder="0,00" onkeypress="return check(event)"> mts</td>';
        trPuertas += '<td class="less" onclick="quitarElement(this)">-</td>';
        trPuertas += '</tr>';
        $('#tableVentanas').append(trPuertas);
    });

    $('.fachadas').on('change', '.input_text', function (e) {
        calcularTotal();
    });

    $('#puertasyventanas').on('change', '.input_text', function () {
        calcularTotal();
    });

    $('#btnCalcular').on('click', function (e) {
        e.preventDefault();

        var arrFachadas = new Array();
        var arrFachadasTriangulares = new Array();
        var arrPuertas = new Array();
        var arrVentanas = new Array();
        var arrPerfiles = new Array();
        var saltos = 0;

        $('#tableFachada .input_text').each(function (index, element) {
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

        $('#tableTriangular .input_text').each(function (index, element) {
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

            $('#tablePuertas .input_text').each(function (index, element) {
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

            $('#tableVentanas .input_text').each(function (index, element) {
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
            success: function (data) {
                window.location.href = "/resultados/" + data;
            },
            error: function (request, status, error) {
                alert(jQuery.parseJSON(request.responseText).Message);
            }
        });

    });
    
    $('#tableEsquinas .input_text').on('change', function(e){
        calcularPerfilJyL();
        calcularPerfilCortagotera();
    });

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
    alto = alto.toString().replace(',', '.');
    ancho = ancho.toString().replace(',', '.');
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
    alto = alto.toString().replace(',', '.');
    ancho = ancho.toString().replace(',', '.');
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
    
    var total = mt2aRevestir.toFixed(2);
    total = total.replace('.', ',');

    $('.totalMts').text("");
    $('.totalMts').text(total);

    perfilBase = calcularPerfilBase();
    console.log('perfilBase: ' + perfilBase);
    console.log('mt2aRevestir: ' + mt2aRevestir);
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
    
    rta = (parseFloat(mt2Fachada.toFixed(2)) + parseFloat(mt2FachadaTriangular.toFixed(2))) - parseFloat(mt2Vanos.toFixed(2));
    
    return rta;
}

function calcularPerfilBase() {
    var anchoFachadasTotal = 0;
    var anchoFachadas = 0;
    var anchoVentanasTotal = 0;
    var anchoVentanas = 0;
    var total = 0;

    $('.fachadas .input_text.ancho').each(function (index, element) {
        anchoFachadas = $(this).val();
        anchoFachadas = anchoFachadas.toString().replace(',', '.');
        if (isNaN(anchoFachadas) || anchoFachadas == "") {
            anchoFachadas = 0;
        }
        anchoFachadasTotal += parseFloat(anchoFachadas);
    });

    $('#puertasyventanas .input_text.ancho.ventana').each(function (index, element) {
        anchoVentanas = $(this).val();
        anchoVentanas = anchoVentanas.toString().replace(',', '.');
        if (isNaN(anchoVentanas) || anchoVentanas == "") {
            anchoVentanas = 0;
        }
        anchoVentanasTotal += parseFloat(anchoVentanas);
    });

    total = (anchoFachadasTotal + anchoVentanasTotal);

    return total;
}

function calcularPerfilJyL() {
    /*VALORES*/
    var esquinasExternas = $('#cantExternas').val();
    var esquinasInternas = $('#cantInternas').val();
    var cierreLateral = $('#cantCierreLateral').val();
    var altoFachadaPrincipal = $('#tableFachada .input_text.alto:first').val();
    altoFachadaPrincipal = altoFachadaPrincipal.toString().replace(',', '.');
    var altoVentana1 = $('#tableVentanas .input_text.alto:first').val();
    altoVentana1 = altoVentana1.toString().replace(',', '.');
    
    /*CALCULOS*/
    var perfilExterno = parseFloat(altoFachadaPrincipal) * parseInt(esquinasExternas);
    var perfilInterno = parseFloat(altoFachadaPrincipal) * parseInt(esquinasInternas);
    var perfilCierreLateral = parseFloat(altoFachadaPrincipal) * parseInt(cierreLateral);
    var perfilJ1x2 = parseFloat(altoVentana1) * 2;
    var perfilJF1 = (parseFloat(perfilExterno) * 2) + (parseFloat(perfilInterno) * 2) + parseFloat(perfilCierreLateral) + parseFloat(perfilJ1x2);
    var altoRestoVentanas = 0;
    
    $('#tableVentanas tr').find('.input_text.alto').each(function (index, element) {
        var alto = $(this).val();
        alto = alto.toString().replace(',', '.');
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
    $('#tableVentanas tr').find('.input_text.ancho').each(function (index, element) {
        var ancho = $(this).val();
        ancho = ancho.toString().replace(',', '.');
        if (isNaN(ancho) || ancho == "") {
            ancho = 0;
        }
        anchoVentanas += parseFloat(ancho);
    });
    perfilCortagotera = anchoVentanas;
}

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9,]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}