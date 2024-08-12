<div class="table" style="grid-template-columns: repeat({{ count($headers) + 1 }}, auto)">
    @foreach ($headers as $h)
        <div class="table-header">{{ $h }}</div>
    @endforeach
    <div class="table-header">&nbsp;</div>
    @foreach ($tableData as $d)
        @foreach ($headers as $h)
            <div class="table-data">{{ $d[$h] }}</div>
        @endforeach
        <div class="table-data"></div>
    @endforeach
</div>
