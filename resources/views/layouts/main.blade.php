<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cedral: Weatherboard Cladding - Cedral</title>
    <meta name="description" content="Give your house a timelessly beautiful facade with Cedral. Ideal for new builds and renovation projects. Cedral is low maintenance and easy to install. ">
    <meta name="keywords" content="Weatherboard, cladding">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cedral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?v=1.4') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.1') }}">

    @yield('css')

</head>

<body>
    
    @yield('contenido')
    
        
    @yield('js')
</body>

</html>