@extends('layouts.main') 

@section('contenido')

<!-- PROGRESS BAR -->
<div class="site__form-header">
    <!-- progressbar -->
    <ul id="progressbar">
        <a href="" class="previous action-button back-arrow">
            <img src="{{ asset('/img/icons/Icono-regresar.png') }}" alt="" width="20">
        </a>
        <li class="active">
            1
        </li>
        <li>
            <span>2</span>
        </li>
        <li>
            <span>3</span>
        </li>
        <li>
            <span>4</span>
        </li>
        <li>
            <span>5</span>
        </li>
        <a href="" class="previous action-button close-form">
            <img src="{{ asset('/img/icons/Icono-Cerrar.png') }}" alt="" width="20">
        </a>
    </ul>
</div>

<section class="section">
    <h2 class="fs-title">Seleccionar revestimiento</h2>
    <div class="revestimiento-box">
        <div class="img-header">
            <img src="{{ asset('/img/Revestimiento-Exterior.png') }}" alt="" width="250">
        </div>
        <div class="selection-buttons">
            <button id="btnInterior" class="btn-lines" onclick="selectInterior(this)">Interior (6mm)</button>
            <button id="btnExterior" class="btn-lines" onclick="selectExterior(this)">Exterior (8mm)</button>
        </div>
        <div class="footer-section">
            <a href="{{ route('step.2') }}" class="btn-large-primary">Siguiente</a>
        </div>
    </div>
</section>

@endsection

@section('js')
<script>
    function selectInterior(e)
    {
        var btnInterior = document.getElementById("btnInterior");
        var btnExterior = document.getElementById("btnExterior");
        
        btnInterior.classList.add('active');
        btnExterior.classList.remove('active');
    }

    function selectExterior(e)
    {
        var btnInterior = document.getElementById("btnInterior");
        var btnExterior = document.getElementById("btnExterior");
        
        btnInterior.classList.remove('active');
        btnExterior.classList.add('active');
    }
</script>
@endsection