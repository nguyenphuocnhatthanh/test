@extends('layout')

@section('content')
    <h1>Create Links</h1>
    {!! Form::open(['url' => 'links']) !!}
        @include('partials.error')
        <!-- url Form Input  -->
        {!! Form::label('url', 'Url:') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@stop