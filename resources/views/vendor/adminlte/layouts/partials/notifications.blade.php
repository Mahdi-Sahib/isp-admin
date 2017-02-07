

<!-- will be used to show any messages -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') . ' by  '  . '( ' . Auth::user()->name . ' )'}} </div>
@endif
