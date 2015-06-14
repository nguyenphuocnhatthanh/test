@extends('layout')

@section('content')
    <h1>Edit Product: {{$product->product_name}}</h1>
    @include('products.form')
@stop