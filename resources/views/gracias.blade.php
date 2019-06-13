@extends('layouts.main') 

@section('contenido')

<section id="gracias">
    <div class="contenedor">
        <div class="item">
            <div class="full-width">
                <img src="{{ asset('img/check.svg') }}" alt="">
            </div>
            <div class="full-width">
                <h2>Ya recibiste tu resultado</h2>
            </div>
            <div class="full-width">
                <h4>Muchas gracias por utilizar nuestro cotizador.</h4>
            </div>
            @if($pdf)
            <div class="full-width">
                <button style="width: 140px;margin-top: 18px;" onclick="bajarPDF();" class="orange-btn">Descargar PDF</button>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
@section('js')
<script>

    function bajarPDF(codigo){
        window.location.href = "/{{ $pdf }}";
    }

</script>
@endsection