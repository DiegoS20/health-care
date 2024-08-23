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
            <a href="" class="small material-icons" id="delete" title="Eliminar">
                delete_forever
            </a>
            <a href="" class="small material-icons" id="edit" title="Editar">
                edit
            </a>
        </div>
    @endforeach
</div>
