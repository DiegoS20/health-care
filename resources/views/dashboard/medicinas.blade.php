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
    $headers = ['Nombre', 'Stock'];
    $data = [];

    foreach ($medicinas as $m) {
        array_push($data, [
            'id' => $m['idMedicina'],
            'Nombre' => $m['nombre'],
            'Stock' => $m['stock'],
        ]);
    }
@endphp

@section('content')
    <x-search-add-bar searchUrl="{{ route('medicinas') }}" routeName="create-medicina-form" />
    <x-table :headers="$headers" :tableData="$data" editRoute="edit-medicina" deleteRoute="destroy-medicina"
        paramName="medicina" />
@endsection
