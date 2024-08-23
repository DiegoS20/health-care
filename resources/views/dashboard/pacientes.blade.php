@extends('templates.dashboard-side-menu')

@section('title', 'Pacientes')

@section('styles')
    @vite(['resources/scss/search-add-bar.scss', 'resources/scss/table.scss'])
    <style>
        .table {
            margin-top: 50px
        }
    </style>
@endsection

@php
    $headers = ['ID Paciente', 'Nombre', 'Fecha de nacimiento', 'Número de contacto', 'Historial'];

    $data = [
        [
            'ID Paciente' => 1,
            'Nombre' => 'Paracetamol',
            'Fecha de nacimiento' => '11/11/2000',
            'Número de contacto' => '60304689',
            'Historial' => '<h5>ICONO</h5>',
        ],
    ];
@endphp

@section('content')
    <x-search-add-bar searchUrl="{{ route('pacientes') }}" routeName="create-paciente-form" />
    <x-table :headers="$headers" :tableData="$data" />
@endsection
