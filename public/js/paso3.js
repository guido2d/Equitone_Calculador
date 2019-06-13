$('#btnFinalizar').on('click', function(e){

    e.preventDefault();

    var descargar_resultado = $('#descargar_resultado').prop('checked');
    var enviar_email = $('#enviar_email').prop('checked');
    var contactar_instalador = $('#contactar_instalador').prop('checked');

    if(!descargar_resultado && !enviar_email && !contactar_instalador){

        let texto = `Por favor seleccione alguna de las tres opciones:
        <br>Descargar Resultado
        <br>Enviar a mi mail el resultado
        <br>Contactar a un instalador
        `;

        Swal.fire({
            html: texto,
            type: 'error',
            confirmButtonText: 'Ok'
        });

        return;
    }

    var url = $(this).attr('href');

    console.log(url);

    window.location.href = url + `?descargar_resultado=${descargar_resultado}&enviar_email=${enviar_email}&contactar_instalador=${contactar_instalador}`;

});