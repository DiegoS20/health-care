@extends('templates.dashboard-side-menu')

@section('title', 'Agregar medicina')

@section('content')
    <form class="row" action="#">
        <div class="input-field col s6">
            <input required placeholder="Nombre de la medicina" id="medicine" type="text" class="validate" autocomplete="off"
                value="{{ $medicine ?? '' }}">
            <label for="medicine">Medicinas</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="Cantidad" id="quantity" class="validate" type="number" value="{{ $quantity ?? '' }}"
                min="0" max="1000" required>
            <label for="quantity">Cantidad</label>
        </div>
        <div class="col s12">
            <button class="waves-effect waves-light btn" type="submit"
                style="background-color: var(--cyan)">Enviar</button>
        </div>
    </form>
@endsection
