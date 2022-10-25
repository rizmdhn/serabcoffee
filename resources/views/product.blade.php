@extends('layouts.master')

@section('pageTitle', 'Serabs product')

@section('content')
    <div class="row pt-4 ">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-All-tab" href="/product">All</a>
                <a class="nav-link" id="v-pills-Coffee-tab" href="/product/coffee">Coffee</a>
                <a class="nav-link" id="v-pills-nonCoffee-tab" href="/product/non-coffee">Non-Coffee</a>
                <a class="nav-link" id="v-pills-MainCourse-tab" href="#v-pills-MainCourse">Main Course</a>
            </div>
        </div>
        <div class="col-9">
            <div class="row p-2">
                @foreach ($products as $product)
                    {{-- @if ($product->product_category == '2') --}}
                    <div class="col-xl-4 col-sm-6">
                        <div class="container-fluid page-wrapper p-0">
                            <div class="el-wrapper w-100 p-0 m-1">
                                <div class="box-up">
                                    <img class="img" style=" width: 200px;
                                                            height: 300px; object-fit: cover"
                                        src="{{ asset('storage/product') . '/' . $product->file_path }}" alt="">
                                    <div class="img-info">
                                        <div class="info-inner">
                                            <span class="p-name">{{ $product->product_name }}</span>
                                            <span class="p-company">{{ $product->product_category }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-down">
                                    <div class="h-bg">
                                        <div class="h-bg-inner">
                                        </div>

                                    </div>
                                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->product_name }}" name="product_name">
                                                <input type="hidden" value="{{ $product->harga }}" name="harga">
                                                <input type="hidden" value="1" name="quantity">
                                                <input type="hidden" value="{{ $product->file_path}} "  name="image">
                                                <a class="cart">
                                                    <span class="price">Rp
                                                        {{ $product->harga }},-</span>
                                                <button class="add-to-cart" style="background: none; border: none">
                                                    <span class="txt">Add in cart</span>
                                                </button>
                                            </a>
                                             </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    </div>
    @endsection
