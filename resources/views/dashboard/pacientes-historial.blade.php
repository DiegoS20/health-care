@extends('templates.dashboard-side-menu')

@section('title', 'Historial')

@section('styles')
    @vite(['resources/scss/pacientes-historial.scss'])
@endsection

@section('content')
    <div class="content-wrapper">
        <h5>Historial de consultas</h5>

        <div class="consultas">
            <div class="consulta">
                <img src="{{ asset('images/consulta.png') }}" alt="Consulta Icon" class="consulta-icon">
                <div class="information">
                    <div class="name-date">
                        <span class="name">Diego Saravia</span>
                        <div class="day">23/08/2024</div>
                    </div>
                    <div class="state pending">Pendiente</div>
                </div>
                <div class="details">
                    <a href='' class='material-icons'>history</a>
                </div>
            </div>
            <div class="consulta">
                <img src="{{ asset('images/consulta.png') }}" alt="Consulta Icon" class="consulta-icon">
                <div class="information">
                    <div class="name-date">
                        <span class="name">Diego Saravia</span>
                        <div class="day">23/08/2024</div>
                    </div>
                    <div class="state done">Realizado</div>
                </div>
                <div class="details">
                    <a href='' class='material-icons'>history</a>
                </div>
            </div>
        </div>
    </div>
@endsection
