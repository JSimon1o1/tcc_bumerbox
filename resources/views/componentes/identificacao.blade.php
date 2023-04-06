@if(Auth::check())
    <div class="d-flex my-1 justify-content-end">
        <label id="informacao-label" class="p-2">{{ Auth::user()->nome }}</label>
    </div>
@endif
