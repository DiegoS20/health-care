@extends('templates.dashboard-side-menu')

@section('title', 'Pacientes')

@php
    $action = '';
    if (isset($paciente)) {
        $id = Route::current()->parameter('paciente');
        $action = route('update-paciente', ['paciente' => $id]);
    } else {
        $action = route('create-paciente');
    }
@endphp

@section('content')
    <form method="POST" action="{{ $action }}">
        @csrf
        @isset($paciente)
            @method('PATCH')
        @endisset
        <div class="row">
            <div class="input-field col s12">
                <input required placeholder="Nombre(s)" id="nombres" name="nombres" type="text" class="validate"
                    autocomplete="off" value="{{ $paciente['nombres'] ?? '' }}">
                <label for="nombres">Nombre(s)</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input required placeholder="Apellido(s)" id="apellidos" name="apellidos" type="text" class="validate"
                    autocomplete="off" value="{{ $paciente['apellidos'] ?? '' }}">
                <label for="apellidos">Apellido(s)</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input required placeholder="Teléfono" id="telefono" name="telefono" type="tel" pattern="[0-9]{8}"
                    class="validate" autocomplete="off" min="8" value="{{ $paciente['telefono'] ?? '' }}">
                <label for="telefono">Teléfono</label>
            </div>
            <div class="input-field col s6">
                <input required type="text" class="datepicker" id="birthdate" name="fecha_nacimiento"
                    value="{{ $paciente['fecha_nacimiento'] ?? '' }}">
                <label for="birthdate">Fecha de nacimiento</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <h6>Sexo: </h6>
                <label>
                    <input class="with-gap" name="sexo" type="radio" value="M" @checked(@$paciente['sexo'] != 'H') />
                    <span>Femenino</span>
                </label>
                <br>
                <label>
                    <input class="with-gap" name="sexo" type="radio" value="H" @checked(@$paciente['sexo'] == 'H') />
                    <span>Masculino</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button type="submit" class="waves-effect waves-light btn">Registrar</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const datepickers = document.querySelectorAll('.datepicker');
            M.Datepicker.init(datepickers, {
                format: 'yyyy-mm-dd',
                maxDate: new Date(),
                yearRange: 50,
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                        "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    ],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct",
                        "Nov", "Dic"
                    ],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"]
                }
            });
        });
    </script>
@endsection
