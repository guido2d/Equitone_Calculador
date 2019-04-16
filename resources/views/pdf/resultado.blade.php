<!DOCTYPE html>
<html>

<head>
    <title>Cedral: Weatherboard Cladding - Cedral</title>
    <meta name="description" content="Give your house a timelessly beautiful facade with Cedral. Ideal for new builds and renovation projects. Cedral is low maintenance and easy to install. ">
    <meta name="keywords" content="Weatherboard, cladding">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <!-- CSS -->
    <style>
        @font-face {
            font-family: GillSans;
            font-weight: 100;
            src: url("../../css/fonts/GillSansMTPro-Light.otf") format("opentype");
        }

        @font-face {
            font-family: GillSans;
            font-weight: 400;
            src: url("../../css/fonts/GillSansMTPro-Book.otf") format("opentype");
        }

        @font-face {
            font-family: GillSans;
            font-weight: 600;
            src: url("../../css/fonts/GillSansMTPro-Medium.otf") format("opentype");
        }

        body {
            position: relative;
            display: block;
            margin: 60px 10%;
            font-family: 'GillSans';
            font-weight: 400;
        }

        .logo {
            position: relative;
            display: block;
        }

        h2 {
            position: relative;
            display: block;
            font-family: GillSans;
            font-weight: 100;
            margin-left: 30px;
            font-size: 40px;
            color: #5b6770;
            margin-top: 40px;
        }

        .lineas {
            position: relative;
            display: block;
            border-top: 1px solid #586276;
            border-bottom: 1px solid #586276;
            padding: 20px 25px 12px;
        }

        .lineas span {
            position: relative;
            display: inline-block;
            color: #586276;
            font-size: 22px;
            font-weight: 100;
        }

        .resultadoTotal {
            position: absolute;
            display: inline-block;
            top: -8px;
            right: 40px;
        }

        .resultadoTotal p,
        .resultadoTotal div {
            position: relative;
            display: inline-block;
            font-size: 22px;
            font-weight: 600;
        }

        .divider-dotted {
            position: absolute;
            height: 32px;
            border: 1px solid #586276;
            margin: 0px 25px;
            top: 8px;
        }

        .m-wrap {
            margin: 30px 50px 0px;
        }

        .oline {
            text-align: center;
            width: 13%;
        }

        .table-calculator {
            position: relative;
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 10px;
        }

        .table-calculator th {
            font-family: GillSans;
            font-weight: 100;
            color: #586276;
            font-size: 20px;
        }

        .table-calculator td {
            font-family: GillSans;
            font-weight: 400;
            color: #5b6770;
            font-size: 23px;
        }

        hr.dotted {
            border-top: 1px dashed #5b6770;
        }

        .table-esquinas {
            position: relative;
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 18px;
        }

        .table-esquinas th {
            font-family: GillSans;
            font-weight: 100;
            color: #5b6770;
            font-size: 20px;
        }

        .table-esquinas td {
            font-family: GillSans;
            font-weight: 400;
            color: #5b6770;
            font-size: 23px;
        }

    </style>
</head>

<body>
    <div class="logo">
        <img src="{{ asset('img/logo_cedral_pdf.png') }}" alt="Logo Cedral" width="400">
    </div>
    <h2>Cómputo</h2>

    <div class="lineas">
        <span><img src="{{ asset('img/lineas.png') }}" alt="" width="15"> Revestimiento con <let style="font-weight:400;">PIZARREÑO CEDRAL ®</let></span>
        <div class="resultadoTotal">
            <p>TOTAL</p>
            <div class="divider-dotted"></div>
            <p class="total-mt"> {{ number_format($mt2, 2, '.', '') }} mts<sup>2</sup> </p>
        </div>
    </div>

    <div class="m-wrap">
        <table id="tableFachada" class="table-calculator">
            <tr>
                <th></th>
                <th>Alto</th>
                <th>Ancho</th>
            </tr>
            @if(is_array($fachadas_rectangulares) and sizeof($fachadas_rectangulares) > 0) @foreach($fachadas_rectangulares as $fc)
            <tr>
                <td class="first-line">{{ $fc->nombre }}</td>
                <td class="oline">{{ $fc->alto }} mts</td>
                <td class="oline">{{ $fc->ancho }} mts</td>
            </tr>
            @endforeach @endif @if(is_array($fachadas_triangulares) and sizeof($fachadas_triangulares) > 0) @foreach($fachadas_triangulares as $ft)
            <tr>
                <td class="first-line">{{ $ft->nombre }}</td>
                <td class="oline">{{ $ft->alto }} mts</td>
                <td class="oline">{{ $ft->ancho }} mts</td>
            </tr>
            @endforeach @endif @if(is_array($puertas) and sizeof($puertas) > 0 || is_array($ventanas) and sizeof($ventanas) > 0) @if(is_array($puertas) and sizeof($puertas) > 0) @foreach($puertas as $p)
            <tr>
                <td class="first-line">{{ $p->nombre }}</td>
                <td class="oline">{{ $p->alto }} mts</td>
                <td class="oline">{{ $p->ancho }} mts</td>
            </tr>
            @endforeach @endif @if(is_array($ventanas) and sizeof($ventanas) > 0) @foreach($ventanas as $v)
            <tr>
                <td class="first-line">{{ $v->nombre }}</td>
                <td class="oline">{{ $v->alto }} mts</td>
                <td class="oline">{{ $v->ancho }} mts</td>
            </tr>
            @endforeach @endif
        </table>
        @endif @if(is_array($perfiles) and sizeof($perfiles) > 0)
        <hr class="dotted">
        <table class="table-esquinas">
            <tr>
                <th></th>
                <th>Cantidad</th>
            </tr>
            <tr>
                <td>Externas</td>
                <td class="oline">{{ $perfiles[0]->cantExternas }}</td>
            </tr>
            <tr>
                <td>Internas</td>
                <td class="oline">{{ $perfiles[0]->cantInternas }}</td>
            </tr>
            <tr>
                <td>Cierre lateral</td>
                <td class="oline">{{ $perfiles[0]->cantCierreLateral }}</td>
            </tr>
        </table>
        @endif
    </div>

</body>

</html>
