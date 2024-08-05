@php
    $routes = [
        [
            'route_name' => 'dashboard-index',
            'icon' => 'dashboard',
            'title' => 'Dashboard',
        ],
        [
            'route_name' => 'citas',
            'icon' => 'perm_contact_calendar',
            'title' => 'Citas',
        ],
        [
            'route_name' => 'medicinas',
            'icon' => 'local_hospital',
            'title' => 'Medicinas',
        ],
        [
            'route_name' => 'pacientes',
            'icon' => 'airline_seat_flat',
            'title' => 'Pacientes',
        ],
    ];
@endphp

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health Care | @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }} " />
    @vite(['resources/scss/side-navbar.scss', 'resources/scss/resets.scss'])
    @yield('styles')
</head>

<body class="body">
    <nav class="side-navbar">
        <div class="icon-container">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <div class="navbar-items">
            @foreach ($routes as $route)
                <a class="navbar-item {{ Route::is($route['route_name']) ? 'active' : '' }}"
                    href="{{ route($route['route_name']) }}">
                    <li class="material-icons">{{ $route['icon'] }}</li>
                    <span>{{ $route['title'] }}</span>
                </a>
            @endforeach
        </div>
    </nav>
    <main>
        <header class="header">
            <h1>@yield('title')</h1>
            <div class="doctor">
                <span>Dr. Salvador</span>
                <img src="https://picsum.photos/20/20" alt="">
            </div>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/materialize.min.js') }} "></script>
    @yield('scripts')
</body>

</html>
