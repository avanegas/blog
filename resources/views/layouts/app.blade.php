<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Costos') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Costos') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Datos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/equipos">Equipos</a>
                              <a class="dropdown-item" href="#">Materiales</a>
                              <a class="dropdown-item" href="#">Obreros</a>
                              <a class="dropdown-item" href="#">Transportes</a>
                            </div>
                        </li>
                        <li><a class="nav-link" href="#">Precios</a></li>
                        <li><a class="nav-link" href="#">Proyectos</a></li>
                        <li><a class="nav-link" href="#">Ofertas</a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else

                            <li><a class="nav-link" href="{{ route('posts.index') }}">Entradas</a></li>

                            @role('admin')
                                <li><a class="nav-link" href="{{ route('categories.index') }}">Categorías</a></li>
                                <li><a class="nav-link" href="{{ route('tags.index') }}">Etiquetas</a></li>
                            @endrole
                            
                            <!-- Notifications-->
                            <li class="nav-item dropdown" id="markasread" onclick="markNotificationAsRead()">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell"></i>  <span class="badge badge-pill badge-info">{{count(Auth::user()->unreadNotifications)}}</span>
                                </a>
                             
                                <ul class="nav-item dropdown">
                                    <li class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach (Auth::user()->unreadNotifications as $notification)
                                            <a class="dropdown-item" href="{{ route('posts.show', $notification->data['post']['id']) }}">
                                                <strong>{{ $notification->data["user"]["name"] }} </strong>
                                                 parafraseó en  
                                                <cite>{{ $notification->data["post"]["name"] }}</cite>
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>

                            <!-- Autentificacion  links -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @role('admin') {{-- Laravel-permission blade helper --}}
                                        <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fa fa-btn fa-unlock"></i>Admin</a> 
                                    @endrole
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        @if (session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($errors))            
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    
    @section('scripts')
        <script type="text/javascript">
            function markNotificationAsRead(){
                $.get('/markAsRead');
            }
        </script>
    @endsection

    @yield('scripts')
</body>
</html>
