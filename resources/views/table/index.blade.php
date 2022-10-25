@extends('layouts.backofficemaster')

@section('pageTitle', 'Tables Index')

@section('content')
    <h1 class="display-6">Tables</h1>
    <a href="{{route('backoffice.table.create')}}" class="btn btn-primary m-1">Create New</a>
    <hr/>


    <table class="table">
        <thead>
        <th>No.</th>
        <th>Table number</th>
        <th>Created at</th>
        <th colspan="3">Actions</th>
        </thead>
        <?php $no = 1; ?>
        @foreach($tables as $table)
        <tr>
                <td>{{ $no++ }}</td>
                <td>{{$table->table_number}}</td>
                <td>{{$table->created_at}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('backoffice.table.edit', $table->id)}}" class="btn btn-primary m-1">Edit</a>

                        <form action="{{ route('backoffice.table.destroy', $table->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger m-1">Delete Table</button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

@endsection
