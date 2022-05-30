<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    @section('header')
    <h1>Cabecera de la Web{master}</h1>
    @show
    <hr>
    <div class="container">
        @yield('content')
    </div>
    <hr>
    @section('footer')
    Pie de pagina de la Web{master}
    @show
</body>

</html>