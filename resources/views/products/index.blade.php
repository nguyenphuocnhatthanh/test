@extends('layout')

@section('content')
    <h1>Products</h1>

    @foreach($products as $product)
        @if(Session::has('msg'))
            <p>{{Session::get('msg')}}</p>
        @endif
        <div id="products">
            <h3>{!!link_to_asset('products/edit/'.$product->id,$product->product_name)!!}</h3>
            <p>{{$product->description}}</p>
        </div>
    @endforeach
@stop