<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventario 1.0</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('imagen/smn2.ico') }}" type="image/x-icon" sizes="10x15"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS for Sidebar -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .wrapper {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background: #1B4332; /* Fondo oscuro */
            color: #fff;
            flex-shrink: 0;
            padding-top: 20px;
            height: 100vh; /* Ajusta la altura de la ventana */
        }
        .sidebar .sidebar-header {
            padding: 20px;
            background: #1B4332; /* Mismo fondo */
            text-align: center;
            border-bottom: none; /* Elimina la línea de división */
        }
        .sidebar ul.components {
            padding: 20px 0;
        }
        .sidebar ul li a {
            padding: 10px 20px;
            font-size: 1.1em;
            display: block;
            color: #fff;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
            
        }
        .content {
            width: 100%;
            padding: 20px;
        }
        .navbar-brand {
            background: #1B4332; /* Fondo oscuro */
            padding: 10px 20px;
        }
        .navbar {
            background-color: #1B4332;
            border-bottom: none; /* Elimina la línea de división */
            box-shadow: none; /* Elimina la sombra */
        }
        .navbar-toggler {
            border: none; /* Elimina el borde del botón de toggle */
        }
        .navbar-brand img {
            width: auto;
            height: 50px;
        }
        .navbar-brand,
        .navbar-nav .nav-link,
        .dropdown-menu .dropdown-item {
            color: white !important; /* Asegura que el texto sea blanco */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" title="Panel Principal" href="{{ url('/home') }}" style="color: white;">
                    <img src="{{ asset('imagen/smn.png') }}" alt="Logo-SMN">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" style="color: white;">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="wrapper">
            @auth
            <nav id="sidebar" class="sidebar">
                

                <ul class="list-unstyled components ">
                    <li>
                        <a href="{{ route('home') }}" style="color: white;">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}" style="color: white;">Roles</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" style="color: white;">Usuarios</a>
                    </li>
                    <li>
                        <a href="{{ route('empleado.index') }}" style="color: white;">Empleados</a>
                    </li>
                    <li>
                        <a href="{{ route('stock.index') }}" style="color: white;">Stock</a>
                    </li>
                    <li>
                        <a href="{{ route('asigaper.index') }}" style="color: white;">Inventario Personal</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('asigsuc.index') }}" style="color: white;">Inventario Sucursales</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('event.index') }}" style="color: white;">Agenda</a>
                    </li>
                    <li>
                        <a href="{{ route('sucursal.index') }}" style="color: white;">Sucursales</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('departamento.index') }}" style="color: white;">Departamentos</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('puesto.index') }}" style="color: white;">Puestos</a>
                    </li>

                </ul>
            </nav>
            @endauth

            <div class="content">
                <main class="py-4">
                    <div class="container">
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-12">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success text-center" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif

                                @yield('content')

                                <div class="row justify-content-center text-center mt-3">
                                    <div class="col-md-12">
                                        <p>© 2024 Ezequiel Perez. Todos los derechos reservados.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>