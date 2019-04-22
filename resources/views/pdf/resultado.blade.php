<!DOCTYPE html>
<html>

<head>
    <title>Cedral: Weatherboard Cladding - Cedral</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- CSS -->
    <style type="text/css" media="all">
        body {
            position: relative;
            display: block;
            font-family: DejaVu Sans;
            font-weight: 400;
            width: 100%;
        }

        .logo {
            position: relative;
            display: block;
        }

        h2 {
            position: relative;
            display: block;
            font-family: DejaVu Sans;
            font-weight: 100;
            font-size: 22px;
            color: #5b6770;
            margin-top: 40px;
        }

        .lineas {
            position: relative;
            display: block;
            border-top: 1px solid #586276;
            border-bottom: 1px solid #586276;
            padding: 10px 0px 10px;
        }

        .lineas span {
            position: relative;
            display: inline-block;
            color: #586276;
            font-size: 12px;
            font-weight: 100;
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
            font-family: DejaVu Sans;
            font-weight: 100;
            color: #586276;
            font-size: 12px;
        }

        .table-calculator td {
            font-family: DejaVu Sans;
            font-weight: 400;
            color: #5b6770;
            font-size: 12px;
        }

        hr.dotted {
            border-top: 1px dashed #5b6770;
            margin-top: 20px;
        }

        .table-esquinas {
            position: relative;
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 18px;
        }

        .table-esquinas th {
            font-family: DejaVu Sans;
            font-weight: 100;
            color: #5b6770;
            font-size: 12px;
        }

        .table-esquinas td {
            font-family: DejaVu Sans;
            font-weight: 400;
            color: #5b6770;
            font-size: 12px;
        }

        .grey {
            color: #5b6770;
        }

        table {
            position: relative;
            display: table;
            width: 100%;
        }

        .page-break {
            page-break-after: always;
        }

        p {
            color: #5b6770;
            font-size: 11px;
            margin-top: 0px;
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -70px;
            right: 0px;
            height: 150px;
        }

        #footer p:first-child {
            font-size: 10px;
        }

    </style>
</head>

<body>
    <div class="logo">
        <img src="{{ asset('img/logo_cedral_pdf.png') }}" alt="Logo Cedral" width="300">
    </div>
    <h2>Cómputo</h2>

    <div class="lineas">
        <table>
            <tr class="grey">
                @if($titulo == 'revestimiento')
                <td colspan="2"><img src="{{ asset('img/lineas.png') }}" alt="" width="10"> Revestimiento con PIZARREÑO CEDRAL ®</td>
                @else
                <td colspan="2"><img src="{{ asset('img/lineas.png') }}" alt="" width="10"> Cerramiento con PIZARREÑO CEDRAL ® </td>
                @endif
                <td style="float:right;">TOTAL &nbsp;| &nbsp;{{ number_format($mt2, 2, '.', '') }} mts<sup>2</sup></td>
            </tr>
        </table>
    </div>

    <div class="m-wrap">
        <table id="tableFachada" class="table-calculator">
            <tr>
                <th></th>
                <th style="text-align: center;">Alto</th>
                <th style="text-align: center;">Ancho</th>
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
        <div id="footer">
            <p>
                El resultado de cantidad de materiales a utilizar que recibirá a través de esta herramienta se basa en la información provista manualmente por usted y en base a geometrías estándar y mejores prácticas.
                <br> Por favor, evaluar los datos informados y, ante cualquier inquietud o necesidad de mayor información, contáctenos a contacto.cl@etexgroup.com.
            </p>
            <p style="background-color:#586276;color:white;margin-top:5px;text-align:right;padding:0px 5px;">
                Sociedad Industrial Pizarreño S.A. / Av. Las Condes 975 - Las Condes Design – Piso 1 – Local 110 / Santiago, Chile <br> T +56 22391 2200 / www.pizarrenocedral.cl / contacto.cl@etexgroup.com
            </p>
        </div>

    </div>

    <div class="page-break"></div>

    <div class="lineas">
        <table style="width:100%;">
            <tr class="grey">
                <td style="font-size: 12px;">Espesor Siding</td>
                <td></td>
                <td style="float:right;font-size: 12px;">6 mm</td>
                <td style="float:right;font-size: 12px;">8 mm</td>
            </tr>
            <tr class="grey">
                <td style="font-size: 12px;">Distancia entre estructura</td>
                <td></td>
                <td style="float:right;font-size: 12px;">400 mm</td>
                <td style="float:right;font-size: 12px;">600 mm</td>
            </tr>
        </table>
    </div>

    <table class="table-esquinas" style="border-spacing: 10px 10px;">
        <tr>
            <th></th>
            <th style="text-align:center;font-size: 12px;">Materiales</th>
            <th style="text-align:center;font-size: 12px;">Unid. de medida</th>
            <th style="text-align:center;font-size: 12px;">Cantidad</th>
            <th style="text-align:center;font-size: 12px;">Cantidad</th>
        </tr>
        @foreach($materiales1 as $m)
        <tr>
            <td style="width:1%;font-size: 12px;">{{ $m['posicion'] }}</td>
            <td style="font-size: 12px;">{{ $m['material'] }}</td>
            <td style="width:15%;text-align:center;font-size: 12px;">{{ $m['unidad'] }}</td>
            <td style="width:15%;text-align:center;font-size: 12px;">{{ $m['cant1'] }}</td>
            <td style="width:15%;text-align:center;font-size: 12px;">{{ $m['cant2'] }}</td>
        </tr>
        @endforeach
    </table>

    <table class="table-esquinas" style="widht:100%;border-spacing: 10px 10px;">
        <tr>
            <th></th>
            <th style="text-align:center;font-size: 12px;">Materiales</th>
            <th style="text-align:center;font-size: 12px;">Unid. de medida</th>
            <th style="text-align:center;font-size: 12px;">Cantidad</th>
            <th style="text-align:center;font-size: 12px;">Cantidad</th>
        </tr>
        @foreach($materiales2 as $m)
        <tr>
            <td style="width:1%;font-size: 12px;">{{ $m['posicion'] }}</td>
            <td style="font-size: 12px;">{{ $m['material'] }}</td>
            <td style="width:15%;text-align:center;font-size: 12px;">{{ $m['unidad'] }}</td>
            <td style="width:15%;text-align:center;font-size: 12px;">{{ ceil($m['cant1']) }}</td>
            <td style="width:15%;text-align:center;font-size: 12px;">{{ ceil($m['cant2']) }}</td>
        </tr>
        @endforeach
    </table>
    <p>
        1 Descripción tornillo perfiles remate
        <br> 2 Tornillo autoperforante y autoavellanante punta aguda 6x1"
        <br> * No tener en cuenta los materiales 8 y 9 en caso de NO instalarse el Siding PIZARREÑO CEDRAL sobre estructura Omega y aplicarse directamen- te sobre un tablero de virutas orientadas.
    </p>

    <div id="footer">
        <p>
            El resultado de cantidad de materiales a utilizar que recibirá a través de esta herramienta se basa en la información provista manualmente por usted y en base a geometrías estándar y mejores prácticas.
            <br> Por favor, evaluar los datos informados y, ante cualquier inquietud o necesidad de mayor información, contáctenos a contacto.cl@etexgroup.com.
        </p>
        <p style="background-color:#586276;color:white;margin-top:5px;text-align:right;padding:0px 5px;">
            Sociedad Industrial Pizarreño S.A. / Av. Las Condes 975 - Las Condes Design – Piso 1 – Local 110 / Santiago, Chile <br> T +56 22391 2200 / www.pizarrenocedral.cl / contacto.cl@etexgroup.com
        </p>
    </div>

</body>

</html>
