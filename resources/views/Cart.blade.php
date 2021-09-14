@extends('layouts.master')


@section('content')

    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="p-4 mb-3 bg-green-400 rounded">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>

    <h3 class="text-3xl text-bold">Cart List</h3>
    <div class="table-responsive">
        <table class="w-full text-sm lg:text-base" cellspacing="0">
            <thead>
                <tr class="h-12 uppercase">
                    <th class="hidden md:table-cell p-3"></th>
                    <th class="text-left">Name</th>
                    <th class="pl-5 text-left lg:text-right lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="hidden lg:inline">Quantity</span>
                    </th>
                    <th class="hidden text-right md:table-cell"> price</th>
                    <th class="hidden text-right md:table-cell"> Remove </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td class="hidden md:table-cell p-4">
                            <a href="#">
                                <img src="{{ asset('storage/product') . '/' . $item->attributes->image }}"
                                    class="rounded" style="width: 300px" alt="Thumbnail">
                            </a>
                        </td>
                        <td class="p-4">
                            <a href="#">
                                <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                            </a>
                        </td>
                        <td class="justify-center mt-6 md:justify-end md:flex p-4">
                            <div class="h-10 w-28">
                                <div class="relative flex flex-row w-full h-8">

                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                            class="w-6 text-center border-0" />
                                        <button type="submit" class="border-0 bg-transparent"><a style="text-decoration: underline; color: blue">
                                            update</a></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td class="hidden text-right md:table-cell p-4">
                            <span class="text-sm font-medium lg:text-base">
                                ${{ $item->price }}
                            </span>
                        </td>
                        <td class="hidden text-right md:table-cell p-4">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="border-0 bg-danger"><a style="text-decoration: underline; color: white">
                                    remove</a></button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div>
            Total: ${{ Cart::getTotal() }}
        </div>
        <div>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
            </form>
        </div>


    </div>
    </main>
@endsection
