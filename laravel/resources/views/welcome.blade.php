<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="./output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Farro:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>F'trick</title>
</head>
<body class="font-sans"> 

    @include('page.header')
    @section('slogan')
        @include('page.slogan')
    @endsection

    @include('page.nosotros')
    @include('page.servicios')
    @include('page.eleccion')
    @include('page.clientes')
    @include('page.equipo')
    @include('page.contactenos')
    @include('page.footer')

</body>
</html>