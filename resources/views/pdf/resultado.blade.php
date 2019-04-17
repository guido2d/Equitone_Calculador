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
            font-size: 14px;
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
            font-size: 14px;
        }

        .table-calculator td {
            font-family: DejaVu Sans;
            font-weight: 400;
            color: #5b6770;
            font-size: 16px;
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
            font-size: 14px;
        }

        .table-esquinas td {
            font-family: DejaVu Sans;
            font-weight: 400;
            color: #5b6770;
            font-size: 14px;
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
        
        p{
            color: #5b6770;
            font-size: 11px;
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
                <td colspan="2"><img src="{{ asset('img/lineas.png') }}" alt="" width="10"> Revestimiento con PIZARREÑO CEDRAL ®</td>
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
    </div>
    <div class="page-break"></div>
    <div class="lineas" style="margin-top:20px;">
        <table>
            <tr class="grey">
                <td>Espesor Siding</td>
                <td></td>
                <td style="float:right;">6 mm</td>
                <td style="float:right;">8 mm</td>
            </tr>
            <tr class="grey">
                <td>Distancia entre estructura</td>
                <td></td>
                <td>400 mm</td>
                <td>600 mm</td>
            </tr>
        </table>
    </div>

    <table class="table-esquinas" style="margin-top:20px;">
        <tr>
            <th></th>
            <th style="text-align:center;">Materiales</th>
            <th style="text-align:center;">Unid. de medida</th>
            <th style="text-align:center;">Cantidad</th>
            <th style="text-align:center;">Cantidad</th>
        </tr>
        @foreach($materiales1 as $m)
        <tr>
            <td style="width:1%;">{{ $m['posicion'] }}</td>
            <td>{{ $m['material'] }}</td>
            <td style="width:15%;text-align:center;">{{ $m['unidad'] }}</td>
            <td style="width:15%;text-align:center;">{{ $m['cant1'] }}</td>
            <td style="width:15%;text-align:center;">{{ $m['cant2'] }}</td>
        </tr>
        @endforeach
    </table>
    
    <table class="table-esquinas" style="margin-top:30px;">
        <tr>
            <th></th>
            <th style="text-align:center;">Materiales</th>
            <th style="text-align:center;">Unid. de medida</th>
            <th style="text-align:center;">Cantidad</th>
            <th style="text-align:center;">Cantidad</th>
        </tr>
        @foreach($materiales2 as $m)
        <tr>
            <td style="width:1%;">{{ $m['posicion'] }}</td>
            <td>{{ $m['material'] }}</td>
            <td style="width:15%;text-align:center;">{{ $m['unidad'] }}</td>
            <td style="width:15%;text-align:center;">{{ ceil($m['cant1']) }}</td>
            <td style="width:15%;text-align:center;">{{ ceil($m['cant2']) }}</td>
        </tr>
        @endforeach
    </table>
    <p>1 Descripción tornillo perfiles remate</p>
    <p>2 Tornillo autoperforante y autoavellanante punta aguda 6x1"</p>
    <p>* No tener en cuenta los materiales 8 y 9 en caso de NO instalarse el Siding PIZARREÑO CEDRAL sobre estructura Omega y aplicarse directamen- te sobre un tablero de virutas orientadas.</p>
    

</body>

</html>
