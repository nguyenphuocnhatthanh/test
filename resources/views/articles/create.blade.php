@extends('layout')

@section('content')
    <h1>Write a New Article</h1>

    {!! Form::open(['route' => 'articlecreate']) !!}
        @include('articles.form', ['buttonText' => 'Add'])
    {!! Form::close() !!}
    @include('articles.errors')

@stop