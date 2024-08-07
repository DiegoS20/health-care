@extends('templates.dashboard-side-menu')

@section('title', 'Dashboard')

@section('styles')
    @vite(['resources/scss/dashboard-index.scss'])
@endsection

@section('content')
    <div class="create-patient-container">
        <div class="create-patient-card">
            <div class="create-patient-card-content">
                <h2>Crear paciente</h2>
                <a class="waves-effect waves-light btn">Crear</a>
            </div>
            <img class="create-patient-card-img" src="https://picsum.photos/200/300" />
        </div>
    </div>
    <div class="pending-consultations">
        <h3 class="pending-consultations-title">Consultas Pendientes</h3>
        <div class="pending-consultations-list">
            <a class="pending-consultations-item" href="www.google.com">
                <img src="https://picsum.photos/100" alt="" class="pending-consultations-img">
                <div class="pending-consultations-info">
                    <h5 class="pending-consultations-title">Hanna Johnson</h5>
                    <div class="pending-consultations-datetime">
                        <span>7/30/24</span>
                        <span>2:00 PM</span>
                    </div>
                </div>
                <div class="pending-consultations-state">
                    Pendiente
                </div>
            </a>
            <a class="pending-consultations-item last">
                <img src="https://picsum.photos/100" alt="" class="pending-consultations-img">
                <div class="pending-consultations-info">
                    <h5 class="pending-consultations-title">Hanna Johnson</h5>
                    <div class="pending-consultations-datetime">
                        <span>7/30/24</span>
                        <span>2:00 PM</span>
                    </div>
                </div>
                <div class="pending-consultations-state">
                    Pendiente
                </div>
            </a>
        </div>
    </div>
@endsection
