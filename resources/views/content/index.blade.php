@extends('layout')

@section('content')
    {{$s = microtime(true)}}
    {{dd($articles)}}
    {{$e = microtime(true)}}
    {{round($e - $s, 2)}}
@stop