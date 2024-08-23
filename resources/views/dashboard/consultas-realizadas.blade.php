@extends('dashboard.citas')

@section('subcontent')
    <div class="card p-4">
        <h3 class="mb-4">Historial de Consultas Pendientes</h3>
        <div class="row d-flex justify-content-start flex-wrap">
            @foreach ($citas as $c)
                <div class="col-md-4 col-sm-6 col-12 mb-4 ">
                    <div class="consulta-card d-flex align-items-center">
                        <img src="{{ asset('images/consulta.png') }}" alt="Consulta Icon" class="consulta-icon">
                        <div class="consulta-info">
                            <h5 class="mb-1">{{ $c->paciente->nombres }} {{ $c->paciente->apellidos }}</h5>
                            <p class="mb-1">{{ date('d/m/Y, H:i', strtotime($c->fecha)) }}</p>
                            <span class="estado-realizado">Realizadas</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
