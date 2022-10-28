@extends('layouts.backofficemaster')

@section('pageTitle', 'Backoffice Dashboard')

@section('content')
<br>
    <h1 class="display-6">Dashboard</h1>
    <div class="row">
        @foreach ($tables as $table)
        <div class="col-sm-3">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">{{ $table->table_number }}</h5>
                <div class="overflow-auto" style="height: 300px">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
@endsection
