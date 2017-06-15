@if(count($errors) > 0)
    <div class="alert alert-danger">
        <lu>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </lu>
    </div>
@endif
