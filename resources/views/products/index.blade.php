@extends('layouts.master')

@section('pageTitle', 'products Index')

@section('content')
    <h1 class="display-6">products</h1>
    <a href="{{route('products.create')}}">Create New</a>
    <hr/>


    <table class="table">
        <thead>
        <th>product name</th>
        <th>product category</th>
        <th>product desc</th>
        <th>file_path</th>
        <th>harga</th>
        <th colspan="3">Actions</th>
        </thead>

        @foreach($products as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_category}}</td>
                <td>{{$product->product_desc}}</td>
                <td>{{$product->file_path}}</td>
                <td>{{$product->harga}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-info m-1">Details</a>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary m-1">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger m-1">Delete User</button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

@endsection