@extends('layout')

@section('content')
    <ul>
    @if($errors->has())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    </ul>
    {!! Form::open(['route' => 'users.update']) !!}
        <!-- id Form Input  -->
        {!! Form::hidden('id', $user->id) !!}
        <!-- username Form Input  -->
        {!! Form::label('username', 'Username:') !!}
        {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}

        <!-- email Form Input  -->
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

        <!-- Password Form Input  -->
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <!-- PasswordConfirm Form Input  -->
        {!! Form::label('password_confirmation ', 'Password confirmation ') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    
        {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop