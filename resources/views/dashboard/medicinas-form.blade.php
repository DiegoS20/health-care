@extends('templates.dashboard-side-menu')

@section('title', 'Agregar medicina')

@php
    $action = '';
    if (isset($nombre)) {
        $id = Route::current()->parameter('medicina');
        $action = route('update-medicina', ['medicina' => $id]);
    } else {
        $action = route('create-medicina');
    }
@endphp

@section('content')
    <form class="row" action="{{ $action }}" method="POST">
        @csrf
        @if (isset($nombre))
            @method('PATCH')
        @endif
        <div class="input-field col s6">
            <input required placeholder="Nombre de la medicina" id="medicine" type="text" class="validate" autocomplete="off"
                value="{{ $nombre ?? '' }}" name="nombre">
            <label for="medicine">Medicinas</label>
        </div>
        <div class="input-field col s6">
            <input required placeholder="Cantidad" id="quantity" class="validate" type="number"
                value="{{ $stock ?? 0 }}" min="0" max="1000" name="stock">
            <label for="quantity">Cantidad</label>
        </div>
        <div class="col s12">
            <button class="waves-effect waves-light btn" type="submit"
                style="background-color: var(--cyan)">Enviar</button>
        </div>
    </form>
@endsection
