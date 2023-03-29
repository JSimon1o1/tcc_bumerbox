@if(isset($titulo))
    <div class="d-grid justify-content-center text-center">
        <h4>{{ $titulo }}</h4>
        @if(isset($subTitulo))
            <p>{{ $subTitulo }}</p>
        @endif
    </div>
@endif
