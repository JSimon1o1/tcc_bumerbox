@if($errors->any())
    <div class='d-flex justify-content-center'>
        <ul>
            @foreach($errors->all() as $error)
                <li class='{{ "text-$textcolor" }}'> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
