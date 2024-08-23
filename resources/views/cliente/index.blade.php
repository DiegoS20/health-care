<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente | Citas</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/scss/resets.scss', 'resources/scss/cliente-citas.scss'])
    <style>
        nav {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: end;
            padding-right: 50px;
        }

        nav button {
            display: flex;
            align-items: center;
            height: 100%;
            gap: 10px;
        }
    </style>
</head>

<body class="body">
    <nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button style="cursor: pointer; background: none; border: none">
                <li class="material-icons">exit_to_app</li>
                <span>Logout</span>
            </button>
        </form>
    </nav>
    <h1>Bienvenido {{ $paciente->nombres }} {{ $paciente->apellidos }}</h1>
    <div class="consultas">
        @foreach ($citas as $c)
            <div class="consulta">
                <img src="{{ asset('images/consulta.png') }}" alt="Consulta Icon" class="consulta-icon">
                <div class="information">
                    <div class="name-date">
                        <span class="name">{{ $c->paciente->nombres }} {{ $c->paciente->apellidos }}</span>
                        <div class="day">{{ date('d/m/Y, H:i', strtotime($c->fecha)) }}</div>
                    </div>
                    @if ($c->estado == 'P')
                        <div class="state pending">Pendiente</div>
                    @else
                        <div class="state done">Realizado</div>
                    @endif
                </div>
                <div class="details">
                    <a href='{{ route('detalle-cliente', ['id' => $c->idCita]) }}' class='material-icons'>history</a>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
