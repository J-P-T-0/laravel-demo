<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="container-fluid p-0">

<x-navbar-lg></x-navbar-lg>
<div style="height: 90px"></div>

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

{{ $slot }}

</body>
</html>

