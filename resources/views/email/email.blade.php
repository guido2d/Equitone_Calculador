@if(isset($mtsRevestir))

<h4>Nueva solicitud de instalador</h4>
<p>Estos son los datos de la persona:</p>
<ul>
    <li>Nombre: {{ $nombre }}</li>
    <li>Email: {{ $email }}</li>
    <li>Teléfono: {{ $telefono }}</li>
    <li>Comuna: {{ $comuna }}</li>
    <li>Cantidad de metros a revestir: {{ $mtsRevestir }}</li>
</ul>

@else

<h4>Nueva cotización</h4>
<p>Estos son los datos de la persona:</p>
<ul>
    <li>Nombre: {{ $nombre }}</li>
    <li>Email: {{ $email }}</li>
    <li>Teléfono: {{ $telefono }}</li>
    <li>Comuna: {{ $comuna }}</li>
    <li>Considera realizar la construcción/refacción durante: {{ $tiempo_construccion }}</li>
</ul>

@endif