@if(session('menssagem'))
    <div class="toast-container position-fixed top-0 end-0 m-1">
        <div class="toast bg-warning" role="alert">
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif