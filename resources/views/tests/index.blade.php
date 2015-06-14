@extends('layout')

@section('content')
    <h1>Test FullText Search</h1>
    {!! Form::open(['url' => 'tests/fulltext']) !!}
        <!-- search Form Input  -->
        {!! Form::label('search', 'Search:') !!}
        {!! Form::text('search', null, ['class' => 'form-control']) !!}
        {!! Form::button('Search', ['type' => 'submit' ,'class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    @foreach($tests as $test)
        <p>{{$test->body}}</p>
    @endforeach
@stop