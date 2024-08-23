<div class="table" style="grid-template-columns: repeat({{ count($headers) + 1 }}, auto)">
    @foreach ($headers as $h)
        <div class="table-header">{{ $h }}</div>
    @endforeach
    <div class="table-header">&nbsp;</div>
    @foreach ($tableData as $d)
        @foreach ($headers as $h)
            <div class="table-data">{!! $d[$h] !!}</div>
        @endforeach
        <div class="table-data actions">
            <form action="{{ route($deleteRoute, [$paramName => $d['id']]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="small material-icons" id="delete" title="Eliminar" type="submit">
                    delete_forever
                </button>
            </form>
            <a href="{{ route($editRoute, [$paramName => $d['id']]) }}" class="small material-icons" id="edit"
                title="Editar">
                edit
            </a>
        </div>
    @endforeach
</div>
