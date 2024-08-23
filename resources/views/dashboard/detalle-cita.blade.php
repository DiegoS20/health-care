@extends('templates.dashboard-side-menu')

@section('title', 'Detalles')

@section('content')
    <form class="row" method="POST" action="{{ Request::url() }}">
        @csrf
        <div class="col s12" id="recetas-container">
            <div class="row">
                <div class="input-field col s12">
                    <textarea required id="textarea1" class="materialize-textarea" name="notas" @disabled($cita->estado == 'R')>{{ $cita->notas ?? '' }}</textarea>
                    <label for="textarea1">Notas de la consulta</label>
                </div>
            </div>
            <div class="row">
                <h4 class="col s12">Recetas</h4>
            </div>
            @foreach ($cita->recetas as $r)
                <div class="row" id="receta-template">
                    <div class="col s6">
                        <div class="row">
                            <div class="input-field col s12">
                                <select required name="medicina[]" class="browser-default" @disabled($cita->estado == 'R')>
                                    <option value="" disabled>Selecciona una medicina</option>
                                    @foreach ($medicinas as $m)
                                        <option value="{{ $m['idMedicina'] }}" @selected($m['idMedicina'] == $r['idMedicina'])>
                                            {{ $m['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col s12">
                                <input required placeholder="Cantidad" id="medicine" type="number" class="validate"
                                    autocomplete="off" name="cantidad[]" value="{{ $r['cantidad'] }}"
                                    @disabled($cita->estado == 'R')>
                                <label for="medicine">Medicinas</label>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field col s12">
                            <textarea required id="textarea1" class="materialize-textarea" name="comentario[]" @disabled($cita->estado == 'R')>
                                {{ $r['nota'] }}
                            </textarea>
                            <label for="textarea1">Comentarios</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($cita->estado == 'P')
            <a class="btn-floating btn-large waves-effect waves-light red" id="add-receta">
                <i class="material-icons">add</i>
            </a>
            <br><br>
            <button class="waves-effect waves-light btn">Guardar</button>
        @endif
    </form>
    <div class="row" id="receta-template" style="display: none">
        <div class="col s6">
            <div class="row">
                <div class="input-field col s12">
                    <select required name="medicina[]" class="browser-default">
                        <option value="" disabled selected>Selecciona una medicina</option>
                        @foreach ($medicinas as $m)
                            <option value="{{ $m['idMedicina'] }}">{{ $m['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col s12">
                    <input required placeholder="Cantidad" id="medicine" type="number" class="validate" autocomplete="off"
                        name="cantidad[]">
                    <label for="medicine">Medicinas</label>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field col s12">
                <textarea required id="textarea1" class="materialize-textarea" name="comentario[]"></textarea>
                <label for="textarea1">Comentarios</label>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/detalle.js') }}"></script>
@endsection
