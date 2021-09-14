@extends('layouts.master')

@section('pageTitle', 'products Details')

@section('content')
    <h1 class="display-6">product Details</h1>

    <hr/>

    <dl>
        <dt>Product name</dt>
        <dd>{{$products->product_name}}</dd>

        <dt>Product category</dt>
        <dd>{{$products->product_category}}</dd>

        <dt>product desc</dt>
        <dd>{{$products->product_desc}}</dd>

        <dt>file_path</dt>
        
        <dd style="height: 30vh; width: 100vw; object-fit: cover"><img src="{{asset('storage/product').'/'.$products->file_path}}" ></dd>
        <dt>harga</dt>
        <dd>{{$products->harga}}</dd>
    </dl>

    <div class="d-flex">
        <a href="{{route('products.edit', $products->id)}}" class="btn btn-primary m-1">Edit</a>

        <form action="{{ route('products.destroy', $products->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger m-1">Delete</button>
        </form>
    </div>
@endsection