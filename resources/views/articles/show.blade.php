@extends('layout')

@section('content')
    <h2>{{$article->title}}</h2>
    <p>{{$article->body}}</p>
    <h5>Tags :</h5>
    @unless($article->tags->isEmpty())
        <ul>
            @foreach($article->tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    @endunless
@stop