@extends('layout')

@section('content')
    <h1>Edit :{{$article->title}}</h1>
    {!! Form::model($article, ['route' => ['article.update', $article->id]]) !!}
        @include('articles.form', ['buttonText' => 'Update'])
    {!! Form::close() !!}
    @include('articles.errors')

@stop
