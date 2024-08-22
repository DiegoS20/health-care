@extends('templates.dashboard-side-menu')

@section('title', 'Medicinas')

@section('styles')
    @vite(['resources/scss/search-add-bar.scss', 'resources/scss/table.scss'])
    <style>
        .table {
            margin-top: 50px
        }
    </style>
@endsection

@php
    $headers = ['Nombre', 'Presentación', 'Concentración', 'Cantidad disponible', 'Precio'];

    $data = [
        [
            'Nombre' => 'Paracetamol',
            'Presentación' => 'Tabletas',
            'Concentración' => '500 mg',
            'Cantidad disponible' => 100,
            'Precio' => '$5.00',
        ],
        [
            'Nombre' => 'Ibuprofeno',
            'Presentación' => 'Cápsulas',
            'Concentración' => '200 mg',
            'Cantidad disponible' => 30,
            'Precio' => '$8.00',
        ],
    ];
@endphp

@section('content')
    <x-search-add-bar searchUrl="{{ route('medicinas') }}" routeName="create-medicina-form" />
    <x-table :headers="$headers" :tableData="$data" />
@endsection
