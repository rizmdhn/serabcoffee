@extends('layouts.master')

@section('pageTitle', 'Create A product')

@section('content')
    <h1 class="display-6">Create New product</h1>

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
    {{ Form::open(['action' => 'App\Http\Controllers\ProductController@store','enctype' => 'multipart/form-data']) }}

    <!-- Include the CRSF token -->
    {{Form::token()}}

    <!-- build our form inputs -->
    <div class="form-group">
        {{Form::label('product_name', 'Product Name')}}
        {{Form::text('product_name', '', ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('product_category', 'product category')}}
        {{Form::select('product_category', ['1' => 'Main course', '2' => 'Small bites','3'=>'Coffee','4'=>'Non-Coffee'], ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('product_desc', 'Product desc')}}
        {{Form::text('product_desc', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{ Form::file('file_path', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{Form::label('harga', 'harga')}}
        {{Form::number('harga', '', ['class' => 'form-control'])}}
    </div>

    <!-- build the submission button -->
    {{Form::submit('Create!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection