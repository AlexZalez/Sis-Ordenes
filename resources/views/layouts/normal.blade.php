<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}

        
        
        <title>Basico</title>
    </head>
    <body>
        <ul class="nav bg-success pl-2 ">
            <li class="nav-item mr-2"><a class="nav-link " href="/"><h1 class="text-dark ">Tecnosoluciones</h1></a></li>
            <li class="nav-item pt-1"><a class="nav-link rounded-pill border bg-dark text-white mr-1 mt-2" href="/cliente/create">Crear Cliente</a></li>
            <li class="nav-item pt-1"><a class="nav-link rounded-pill border bg-dark text-white mr-1 mt-2"    href="/equipo">Crear Equipo</a></li>
            <li class="nav-item pt-1"><a class="nav-link rounded-pill border bg-dark text-white mr-1 mt-2"    href="/cliente">Ver</a></li>
        </ul>
        
        <div id="app">
            
            @yield('content')
            
        </div>
        
    </body>
</html>