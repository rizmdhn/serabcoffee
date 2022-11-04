@extends('layouts.backofficemaster')

@section('pageTitle', 'Backoffice Dashboard')

@section('content')
    <br>
    <h1 class="display-6">Dashboard</h1>

    <div class="row">
        @foreach ($order as $table)
            <div class="col-3">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $table['table_number'] }} </h5>
                        <div class="overflow-auto" style="height: 300px">
                            <div class="table-responsive">
                                <table class="w-100 text-sm lg:text-base" cellspacing="0">
                                    <thead>
                                        <tr class="h-12 uppercase">
                                            <th class="text-left">Name</th>
                                            <th class="text-center ">
                                                <span class="hidden lg:inline">Quantity</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table['cart_data'] as $item)
                                            <tr>
                                                <td>
                                                    <div class="text-truncate">
                                                        {{ $item->name }}
                                                    </div>
                                                </td>
                                                <td class="text-center ">
                                                    {{ $item->quantity }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                          <form action="{{ route('backoffice.order.done', $table['id']) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary w-100 align-bottom">Selesaikan Pesanan!</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
