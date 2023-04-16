@if(session('menssagem'))
    <div class="toast-container position-fixed top-0 end-0 m-1">
        <div class="toast {{ session('success') ? 'bg-green-lime' : 'bg-danger' }}" role="alert">
            <div class="toast-body">
                {{ session('menssagem') }}
            </div>
        </div>
    </div>
@endif
