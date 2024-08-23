@extends('templates.dashboard-side-menu')

@section('title', 'Citas')

@section('styles')
    @vite(['resources/scss/citas.scss'])
@endsection

@section('content')
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-4 mb-3">
                <a href="{{ route('nueva-cita') }}" class="btn btn-lg btn-light shadow-sm">
                    <img src="{{ asset('images/nuevo.png') }}" alt="Nueva Consulta" class="img-fluid">
                    <div>Nueva Consulta</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('citas-pendientes') }}" class="btn btn-lg btn-light shadow-sm">
                    <img src="{{ asset('images/pendiente.png') }}" alt="Consultas Pendientes" class="img-fluid">
                    <div>Consultas Pendientes</div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('citas-realizadas') }}" class="btn btn-lg btn-light shadow-sm">
                    <img src="{{ asset('images/realizado.png') }}" alt="Consultas Realizadas" class="img-fluid">
                    <div>Consultas Realizadas</div>
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col s12">
                <div id="content-container">
                    @yield('subcontent')
                </div>
            </div>
        </div>
    </div>
@endsection
