@extends('layouts.backofficemaster')

@section('pageTitle', 'Create A Table')

@section('content')
    <h1 class="display-6">Create New Table</h1>

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
    {{ Form::open(['action' => 'App\Http\Controllers\TableController@store','enctype' => 'multipart/form-data']) }}

    <!-- Include the CRSF token -->
    {{Form::token()}}

    <!-- build our form inputs -->
    <div class="form-group">
        {{Form::label('Table_Number', 'Table Number')}}
        {{Form::text('table_number', '', ['class' => 'form-control'])}}
    </div>

    <!-- build the submission button -->
    {{Form::submit('Create!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection
