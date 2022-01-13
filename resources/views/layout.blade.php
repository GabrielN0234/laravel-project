<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <title>Administración de clientes</title>  
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />
    </head>
    <body id="body" class="supreme-container">
        <header id="menu">
        <nav style="background-color: red;" class="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark bg-dark box-shadow mb-3 text-light">
            <div class="container ">
                <a href="{{ route('Home') }}" style="font-size: 1.4em;" class="navbar-brand">Home</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-lg-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1" >
                        <li class="nav-item">
                            <a href="{{ route('clientes.index') }}" class="nav-link text-light">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ejercicio#4') }}" class="nav-link text-light">Ejercicio 4</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ejercicio#5') }}" class="nav-link text-light">Ejercicio 5</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('consulta.json') }}" class="nav-link text-light">Cosulta BD JSON</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('consulta.xml') }}" class="nav-link text-light">Cosulta BD XML</a>
                        </li>
                    </ul>
                    <partial name="_LoginPartial" />
                </div>
            </div>
        </nav>
    </header>
    
        <div class="container" id="blur">
            <main role="main" class="pb-3">
                @yield('content')
            </main>
        </div>
    </body>
</html>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/JavaScript.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>