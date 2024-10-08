@extends('templates.dashboard-side-menu')

@section('title', 'Pacientes')

@section('styles')
    @vite(['resources/scss/search-add-bar.scss', 'resources/scss/table.scss'])
    <style>
        .table {
            margin-top: 50px
        }

        .codigo-alert {
            background-color: var(--cyan);
            color: #fff;
            padding: 25px;
            font-weight: bold;
            font-size: 25px;
        }
    </style>
@endsection

@php
    $headers = ['ID Paciente', 'Nombre', 'Fecha de nacimiento', 'Número de contacto', 'Sexo', 'Historial'];

    $data = [];
    foreach ($pacientes as $p) {
        $historial = route('historial-paciente', ['paciente' => $p['idPaciente']]);
        array_push($data, [
            'id' => $p['idPaciente'],
            'ID Paciente' => $p['idPaciente'],
            'Nombre' => $p['nombres'] . ' ' . $p['apellidos'],
            'Fecha de nacimiento' => date('d/m/Y', strtotime($p['fecha_nacimiento'])),
            'Número de contacto' => $p['telefono'],
            'Sexo' => $p['sexo'] == 'H' ? 'Masculino' : 'Femenino',
            'Historial' => "<a href='" . $historial . "' class='material-icons' style='color: var(--cyan)'>history</a>",
        ]);
    }
@endphp

@section('content')
    <x-search-add-bar searchUrl="{{ route('pacientes') }}" routeName="create-paciente-form" />
    @if (!is_null(request()->input('codigo')))
        @php
            $codigo = request()->input('codigo');
            $nombre = request()->input('nombre');
        @endphp
        <div class="codigo-alert">El código de {{ $nombre }} es {{ $codigo }}</div>
    @endif
    <x-table :headers="$headers" :tableData="$data" editRoute="edit-paciente" deleteRoute="destroy-paciente"
        paramName="paciente" />
@endsection
