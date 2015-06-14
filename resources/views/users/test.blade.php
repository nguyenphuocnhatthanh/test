@extends('layout')

@section('content')

    @include('users.pagination', ['users' => $users, 'col' => 12])
@stop