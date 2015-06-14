@if($errors->has())
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif