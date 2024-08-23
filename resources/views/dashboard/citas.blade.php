@extends('templates.dashboard-side-menu')

@section('title', 'Citas')

@section('styles')
    @vite(['resources/scss/citas.scss'])
@endsection

@section('content')
<div class="container">
    <div class="row text-center justify-content-center">
        <div class="col-md-4 mb-3">
            <a href="#" class="btn btn-lg btn-light shadow-sm" onclick="loadContent('nueva-consulta')">
                <img src="{{ asset('images/nuevo.png') }}" alt="Nueva Consulta" class="img-fluid">
                <div>Nueva Consulta</div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="#" class="btn btn-lg btn-light shadow-sm" onclick="loadContent('consultas-pendientes')">
                <img src="{{ asset('images/pendiente.png') }}" alt="Consultas Pendientes" class="img-fluid">
                <div>Consultas Pendientes</div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="#" class="btn btn-lg btn-light shadow-sm" onclick="loadContent('consultas-realizadas')">
                <img src="{{ asset('images/realizado.png') }}" alt="Consultas Realizadas" class="img-fluid">
                <div>Consultas Realizadas</div>
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div id="content-container">
               
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function loadContent(view) {
            const contentContainer = document.getElementById('content-container');
            contentContainer.innerHTML = '<div class="text-center"><span>Cargando...</span></div>';

            fetch(`/dashboard/consultas/${view}`)
                .then(response => response.text())
                .then(html => {
                    contentContainer.innerHTML = html;
                })
                .catch(error => {
                    contentContainer.innerHTML = '<div class="text-center text-danger">Error al cargar contenido.</div>';
                    console.error('Error loading content:', error);
                });
        }
    </script>
@endsection
