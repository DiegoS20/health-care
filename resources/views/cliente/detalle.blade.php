<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health Care | Detalle de cita</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/scss/resets.scss', 'resources/scss/cliente-citas.scss'])
    <style>
        body {
            padding: 75px;
        }

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

        form.row {
            padding: 0 150px;
        }
    </style>
</head>

<body>
    <nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button style="cursor: pointer; background: none; border: none">
                <li class="material-icons">exit_to_app</li>
                <span>Logout</span>
            </button>
        </form>
    </nav>
    <h3>Fecha: {{ date('d/m/Y, H:i', strtotime($cita->fecha)) }}</h3>
    <form class="row z-depth-4" method="POST" action="{{ Request::url() }}">
        @csrf
        <div class="col s12" id="recetas-container">
            <div class="row">
                <div class="input-field col s12">
                    <textarea required id="textarea1" class="materialize-textarea" name="notas" disabled>{{ $cita->notas ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <h4 class="col s12">Recetas</h4>
            </div>
            @foreach ($cita->recetas as $r)
                <div class="row" id="receta-template">
                    <div class="col s6">
                        <div class="row">
                            <div class="input-field col s12">
                                <select required name="medicina[]" class="browser-default" disabled>
                                    <option value="" disabled>Selecciona una medicina</option>
                                    @foreach ($medicinas as $m)
                                        <option value="{{ $m['idMedicina'] }}" @selected($m['idMedicina'] == $r['idMedicina'])>
                                            {{ $m['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col s12">
                                <input required placeholder="Cantidad" id="medicine" type="number" class="validate"
                                    autocomplete="off" name="cantidad[]" value="{{ $r['cantidad'] }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field col s12">
                            <textarea required id="textarea1" class="materialize-textarea" name="comentario[]" disabled>
                                {{ $r['nota'] }}
                            </textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
    <div class="row" id="receta-template" style="display: none">
        <div class="col s6">
            <div class="row">
                <div class="input-field col s12">
                    <select required name="medicina[]" class="browser-default">
                        <option value="" disabled selected>Selecciona una medicina</option>
                        @foreach ($medicinas as $m)
                            <option value="{{ $m['idMedicina'] }}">{{ $m['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col s12">
                    <input required placeholder="Cantidad" id="medicine" type="number" class="validate"
                        autocomplete="off" name="cantidad[]">
                    <label for="medicine">Medicinas</label>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field col s12">
                <textarea required id="textarea1" class="materialize-textarea" name="comentario[]"></textarea>
                <label for="textarea1">Comentarios</label>
            </div>
        </div>
    </div>
</body>

</html>
