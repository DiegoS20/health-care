<div class="card p-4">
    <h3 class="mb-4">Historial de Consultas Pendientes</h3>
    <div class="row d-flex justify-content-start flex-wrap">
        @for ($i = 0; $i < 6; $i++)
            <div class="col-md-4 col-sm-6 col-12 mb-4 ">
                <div class="consulta-card d-flex align-items-center">
                    <img src="{{ asset('images/consulta.png') }}" alt="Consulta Icon" class="consulta-icon">
                    <div class="consulta-info">
                        <h5 class="mb-1">Hanna Jonhson</h5>
                        <p class="mb-1">23/07/24, 10:30 AM</p>
                        <span class="estado-realizado">Realizadas</span>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
