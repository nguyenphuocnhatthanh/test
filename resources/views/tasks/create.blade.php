@extends('layout')

@section('content')

    @if($errors->has())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    @endif
    {!!Form::open(['route' => 'tasks.store'])!!}
        <!-- task form Input -->
        <div class="form-group">
            {!!Form::label('task', 'Task:')!!}
            {!!Form::text('task', null, ['class' => 'form-control'])!!}
        </div>
        {!!Form::submit('submit')!!}
    {!!Form::close()!!}
@stop