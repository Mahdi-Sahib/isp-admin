

<!-- will be used to show any success-->
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
@if (Session::has('message_success'))
    <div class="alert alert-success">{{ Session::get('message') . ' by  '  . '( ' . Auth::user()->name . ' )'}} </div>
@endif

@if (Session::has('message_danger'))
    <div class="alert alert-danger">{{ Session::get('message_danger') }} </div>
@endif
