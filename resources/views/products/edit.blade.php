@extends('layouts.master')

@section('pageTitle', 'Edit products Details')

@section('content')

    <h1 class="display-6">Edit product</h1>

    <hr/>
    <!-- if validation in the controller fails, show the errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Open the form with the store function route. -->
    {{ Form::open(['action' => ['App\Http\Controllers\ProductController@update', $products->id], 'method' => 'POST']) }}
    <!-- Include the CRSF token -->
    {{Form::token()}}
    <!-- build our form inputs -->
    <div class="form-group">
        {{Form::label('product_name', 'Product Name')}}
        {{Form::text('product_name', $products->product_name, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('product_category', 'product category')}}
        {{Form::select('product_category',['1' => 'Main course', '2' => 'Small bites','3'=>'Coffee','4'=>'Non-Coffee'], $products->product_category, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('product_desc', 'Product desc')}}
        {{Form::text('product_desc', $products->product_desc, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('harga', 'harga')}}
        {{Form::number('harga', $products->harga, ['class' => 'form-control'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    

    {{Form::submit('Update!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
    
@endsection