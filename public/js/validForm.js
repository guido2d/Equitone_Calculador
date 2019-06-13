var txtButton = "";

$('.btnSubmit').on('click', function (e) {
    e.preventDefault();

    var errores = false;
    var completos = true;
    // var href = $(this).attr('href');

    $('.form-cta').find('input').each(function (index, element) {
        var valor = $(this).val();
        if (valor == "") {
            $(this).addClass("error");
            $('.requeridos.error').fadeIn();
            errores = true;
            completos = false;
        } else {
            $(this).removeClass("error");
        }
    });

    var email = $('#email');

    if (caracteresCorreoValido(email.val()) == false && completos == true) {
        $('.requeridos.error').fadeOut('fast');
        $('.requeridos.email').fadeIn();
        errores = true;
    }

    var checked = $('#tyc').prop('checked');

    if(!checked){
        $('.tyc-requerido').fadeIn();
        errores = true;
    }

    if (errores == false) {
        $('.requeridos.error').fadeOut();
        $('.requeridos.email').fadeOut();
        $('.tyc-requerido').fadeOut();

        var descargar_pdf = $('#descargar_resultado').val();
        var enviar_email = $('#enviar_email').val();
        var instalador = $('#instalador').val();
        var codigo = $('#codigo').val();

        if (descargar_pdf === 'true' && enviar_email === 'false' && instalador === 'false') {
            descargarPDF(codigo);
        } else {
            enviarEmail(descargar_pdf, codigo);
        }
    }
});

// funcion para validar el correo
function caracteresCorreoValido(email) {
    //var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false) {
        return false;
    } else {
        return true;
    }
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

function enviarEmail(descargar_pdf, codigo) {
    var formData = $('.form-cta').serialize();
    $.ajax({
        url: "/enviar-email",
        type: 'POST',
        data: formData,
        beforeSend: function () {
            txtButton = $('.btnSubmit').html();
            $('.btnSubmit').html('');
            $('.btnSubmit').html('Aguarde...');
            $('.btnSubmit').attr('disabled', 'disabled');
        },
        success: function (data) {

            $('.btnSubmit').html('');
            $('.btnSubmit').html(txtButton);
            $('.btnSubmit').attr('disabled', false);

            if (descargar_pdf === 'true') {
                window.location.href = '/gracias?pdf='+codigo;
            } else {
                window.location.href = '/gracias';
            }
        },
        error: function (data) {
            alert($.parseJSON(data.responseText));
            $('.btnSubmit').html('');
            $('.btnSubmit').html(txtButton);
            $('.btnSubmit').attr('disabled', false);
        }
    });
}

function descargarPDF(codigo) {
    var formData = $('.form-cta').serialize();
    $.ajax({
        url: "/guardar-datos",
        type: 'POST',
        data: formData,
        beforeSend: function () {
            txtButton = $('.btnSubmit').html();
            $('.btnSubmit').html('');
            $('.btnSubmit').html('Aguarde...');
            $('.btnSubmit').attr('disabled', 'disabled');
        },
        success: function (data) {
            $('.btnSubmit').html('');
            $('.btnSubmit').html('Generando PDF...');

            if (data === 'ok') {
                window.open('/descargar-pdf/' + codigo, '_blank');
                window.location.href = '/gracias';
            }
        },
        error: function (data) {
            alert('Ha ocurrido un error, por favor vuelva a intentarlo.');
            console.log($.parseJSON(data.responseText));
            $('.btnSubmit').html('');
            $('.btnSubmit').html(txtButton);
            $('.btnSubmit').attr('disabled', false);
        }
    });
}