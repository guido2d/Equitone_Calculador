@extends('layouts.main') 

@section('contenido')

<!-- PROGRESS BAR -->
<div class="site__form-header">
    <!-- progressbar -->
    <ul id="progressbar">
        <a href="{{ route('step.1') }}" class="previous action-button back-arrow">
            <img src="{{ asset('/img/icons/Icono-regresar.png') }}" alt="" width="20">
        </a>
        <li class="active">
            1
        </li>
        <li class="active">
            2
        </li>
        <li>
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

<section class="section">
    <h2 class="fs-title">Producto</h2>
    <div class="product-box">
        <div class="img-header">
            <img src="{{ asset('/img/Img-producto-Siding.png') }}" alt="" width="100">
            <div class="selected">
                <img src="{{ asset('/img/icons/Icono-Checkconfondo.png') }}" alt="" width="30">    
            </div>
            <span class="product-title">Siding Cedral</span>
        </div>
    </div>
</section>

<section class="section">
    <div class="grid-3-boxes">
        <div class="item-box">
            <h3 class="box-title">Terminación</h3>
            <div class="detail-box">
                <div class="grid-2-boxes">
                    <div id="terminacionLiso" class="item">
                        <div class="img-box terminacion-liso" onclick="changeTerminacion('liso')">
                            <div class="checked"></div>
                        </div>
                        <span class="description">Liso</span>
                    </div>
                    <div id="terminacionMadera" class="item">
                        <div class="img-box terminacion-madera" onclick="changeTerminacion('madera')">
                            <div class="checked"></div>
                        </div>
                        <span class="description">Madera</span>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="item-box">
            <h3 class="box-title">Instalación</h3>
            <div class="detail-box">
                <div class="grid-2-boxes">
                    <div id="instaJunta" class="item">
                        <div class="img-box big-box instalacion-junta-vista" onclick="changeInstalacion('junta')">
                            <div class="checked"></div>
                        </div>
                        <span class="description">Junta Vista</span>
                    </div>
                    <div id="instaSolapado" class="item">
                        <div class="img-box big-box instalacion-solapado" onclick="changeInstalacion('solapado')">
                            <div class="checked"></div>
                        </div>
                        <span class="description">Solapado</span>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="item-box">
            <h3 class="box-title">Cerramiento</h3>
            <div class="detail-box">
                <div class="grid-2-boxes">
                    <div id="construTradicional" class="item">
                        <div class="img-box big-box construccion-tradicional" onclick="changeConstruccion('tradicional')">
                            <div class="checked"></div>
                        </div>
                        <span class="description">Construcción<br>tradicional</span>
                    </div>
                    <div id="construSeco" class="item">
                        <div class="img-box big-box construccion-seco" onclick="changeConstruccion('seco')">
                            <div class="checked"></div>
                        </div>
                        <span class="description">Construcción<br>en seco</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <h2 class="fs-title">Color</h2>
    <div class="color-selectors">
        <div class="buttons-group">
            <div class="select-natural" onclick="changeTab('natural')">
                <span>Natural</span>
                <div id="natural-circle" class="circle active"></div>
            </div>
            <div class="select-solido" onclick="changeTab('solido')">
                <span>Solido</span>
                <div id="solido-circle" class="circle"></div>
            </div>
        </div>

        <div class="tabs">
            <div id="natural-tab" class="tabs-box ">
                <img src="{{ asset('/img/Img-Natural.jpg') }}" alt="">
                <div class="colors-options">
                    <div class="item active">
                        <div class="color-img color-natural">
                            <div class="checked"></div>
                        </div>
                        <span class="color-title">Liso natural</span>
                    </div>
                </div>
            </div>

            <div id="solido-tab" class="tabs-box hide">
                <img id="imgBlanco" src="{{ asset('/img/Img-Blanco.jpg') }}" alt="">
                <img id="imgArena" src="{{ asset('/img/Img-Arena.jpg') }}" alt="" class="hide">
                <img id="imgRoble" src="{{ asset('/img/Img-Roble.jpg') }}" alt="" class="hide">
                <img id="imgCaoba" src="{{ asset('/img/Img-Caoba.jpg') }}" alt="" class="hide">
                <img id="imgGris" src="{{ asset('/img/Img-Gris.jpg') }}" alt="" class="hide">
                <div class="colors-options">
                    <div id="colorBlanco" class="item active">
                        <div class="color-img color-blanco" onclick="selectColor('blanco')">
                            <div class="checked"></div>
                        </div>
                        <span class="color-title">Blanco</span>
                    </div>
                    <div id="colorArena" class="item">
                        <div class="color-img color-arena" onclick="selectColor('arena')">
                            <div class="checked"></div>
                        </div>
                        <span class="color-title">Arena</span>
                    </div>
                    <div id="colorRoble" class="item">
                        <div class="color-img color-roble" onclick="selectColor('roble')">
                            <div class="checked"></div>
                        </div>
                        <span class="color-title">Roble</span>
                    </div>
                    <div id="colorCaoba" class="item">
                        <div class="color-img color-caoba" onclick="selectColor('caoba')">
                            <div class="checked"></div>
                        </div>
                        <span class="color-title">Caoba</span>
                    </div>
                    <div id="colorGris" class="item">
                        <div class="color-img color-gris" onclick="selectColor('gris')">
                            <div class="checked"></div>
                        </div>
                        <span class="color-title">Gris</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer-section">
    <a href="{{ route('step.3') }}" class="btn-large-primary">Siguiente</a>
</section>

<div class="footer-section">
</div>

@endsection

@section('js')
<script>

    function changeTerminacion(type)
    {
        var liso = document.getElementById("terminacionLiso");
        var madera = document.getElementById("terminacionMadera");

        if(type === 'liso') {
            liso.classList.add('active');
            madera.classList.remove('active');
        }else{
            madera.classList.add('active');
            liso.classList.remove('active');
        }
    }

    function changeInstalacion(type)
    {
        var junta = document.getElementById("instaJunta");
        var solapado = document.getElementById("instaSolapado");

        if(type === 'junta') {
            junta.classList.add('active');
            solapado.classList.remove('active');
        }else{
            solapado.classList.add('active');
            junta.classList.remove('active');
        }
    }

    function changeConstruccion(type)
    {
        var tradicional = document.getElementById("construTradicional");
        var seco = document.getElementById("construSeco");

        if(type === 'tradicional') {
            tradicional.classList.add('active');
            seco.classList.remove('active');
        }else{
            seco.classList.add('active');
            tradicional.classList.remove('active');
        }
    }

    function changeTab(tabName) 
    {
        var natural = document.getElementById("natural-tab");
        var solido = document.getElementById("solido-tab");
        
        var naturalCircle = document.getElementById("natural-circle");
        var solidoCircle = document.getElementById("solido-circle");

        if( tabName === 'natural' ) {
            solido.classList.add('hide');
            natural.classList.remove('hide');

            naturalCircle.classList.add('active');
            solidoCircle.classList.remove('active');
        }else {
            natural.classList.add('hide');
            solido.classList.remove('hide');

            solidoCircle.classList.add('active');
            naturalCircle.classList.remove('active');
        }
    }

    function selectColor(color)
    {
        var imgBlanco = document.getElementById("imgBlanco");
        var imgArena = document.getElementById("imgArena");
        var imgRoble = document.getElementById("imgRoble");
        var imgCaoba = document.getElementById("imgCaoba");
        var imgGris = document.getElementById("imgGris");

        var colorBlanco = document.getElementById("colorBlanco");
        var colorArena = document.getElementById("colorArena");
        var colorRoble = document.getElementById("colorRoble");
        var colorCaoba = document.getElementById("colorCaoba");
        var colorGris = document.getElementById("colorGris");

        switch( color  ) {
            case "blanco":
                imgBlanco.classList.remove('hide');
                imgArena.classList.add('hide');
                imgRoble.classList.add('hide');
                imgCaoba.classList.add('hide');
                imgGris.classList.add('hide');

                colorBlanco.classList.add('active');
                colorArena.classList.remove('active');
                colorRoble.classList.remove('active');
                colorCaoba.classList.remove('active');
                colorGris.classList.remove('active');

                break;

            case "arena":
                imgBlanco.classList.add('hide');
                imgArena.classList.remove('hide');
                imgRoble.classList.add('hide');
                imgCaoba.classList.add('hide');
                imgGris.classList.add('hide');

                colorBlanco.classList.remove('active');
                colorArena.classList.add('active');
                colorRoble.classList.remove('active');
                colorCaoba.classList.remove('active');
                colorGris.classList.remove('active');

                break;

            case "roble":
                imgArena.classList.add('hide');
                imgBlanco.classList.add('hide');
                imgRoble.classList.remove('hide');
                imgCaoba.classList.add('hide');
                imgGris.classList.add('hide');

                colorArena.classList.remove('active');
                colorBlanco.classList.remove('active');
                colorRoble.classList.add('active');
                colorCaoba.classList.remove('active');
                colorGris.classList.remove('active');

                break;

            case "caoba":
                imgArena.classList.add('hide');
                imgBlanco.classList.add('hide');
                imgRoble.classList.add('hide');
                imgCaoba.classList.remove('hide');
                imgGris.classList.add('hide');

                colorArena.classList.remove('active');
                colorBlanco.classList.remove('active');
                colorRoble.classList.remove('active');
                colorCaoba.classList.add('active');
                colorGris.classList.remove('active');

                break;

            case "gris":
                imgArena.classList.add('hide');
                imgBlanco.classList.add('hide');
                imgRoble.classList.add('hide');
                imgCaoba.classList.add('hide');
                imgGris.classList.remove('hide');

                colorArena.classList.remove('active');
                colorBlanco.classList.remove('active');
                colorRoble.classList.remove('active');
                colorCaoba.classList.remove('active');
                colorGris.classList.add('active');

                break;
        }
    }

</script>
@endsection