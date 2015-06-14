@include('products.error')

{!! Form::model($product, ['route' => 'product.edit', 'files' => true]) !!}
<!-- product_name Form Input  -->
{!! Form::label('product_name', 'Product name:') !!}
{!! Form::text('product_name', null, ['class' => 'form-control']) !!}

<!-- quanlity Form Input  -->
{!! Form::label('quanlity', 'Quanlity:') !!}
{!! Form::text('quanlity', null, ['class' => 'form-control']) !!}

<!-- price Form Input  -->
{!! Form::label('price', 'Price:') !!}
{!! Form::text('price', null, ['class' => 'form-control']) !!}

<!-- img Form Input  -->
{!!HTML::image($product->img)!!}<br/>
{!! Form::label('img', 'Img:') !!}
{!! Form::input('file', 'img', null, ['class' => 'form-control']) !!}

<!-- description Form Input  -->
{!! Form::label('description', 'Description:') !!}
{!! Form::text('description', null, ['class' => 'form-control']) !!}

{!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
{!! Form::close() !!}