<div class="search-add-bar">
    <form action="{{ $searchUrl }}" class="col s12" id="search-add-bar-form">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">search</i>
                <input type="search" class="validate" />
                <label class="active" for="icon_prefix2">Busca aquí</label>
            </div>
        </div>
    </form>
    <i class="medium material-icons modal-trigger" data-target="{{ $modalId }}">add_circle</i>
</div>
<script>
    const searchAddBar = document.querySelector('#search-add-bar-form .input-field');
    searchAddBar.addEventListener('click', function() {
        const input = searchAddBar.querySelector('input');
        input.select();
    });
</script>
