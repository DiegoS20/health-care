@extends('templates.dashboard-side-menu')

@section('title', 'Historial')

@section('styles')
    @vite(['resources/scss/pacientes-historial.scss'])
@endsection

@section('content')
    <div class="content-wrapper">
        <h5>Historial de consultas</h5>

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
                        <a href='{{ route('detalle-consulta', [
                            'idPaciente' => $c->idPaciente,
                            'idCita' => $c->idCita,
                        ]) }}'
                            class='material-icons'>history</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
