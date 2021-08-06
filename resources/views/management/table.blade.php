@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    @include('management.inc.sidebar')
    <div class="col-12 col-md-8 p-2">
        <h6>Table</h6>
        <a href="{{ route('table.create')}}" class="btn btn-success"> <i class="fas fa-plus mr-3"></i>Create Table</a>
        <hr>
        <table class="table table-bordered table-dark mt-3">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Table</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                <tr>
                    <th scope="row">{{$table->id}}</th>
                    <td>{{$table->name}}</td>
                    <td>{{ $table->status}}</td>
                    <td> <a href="{{ route('table.edit',$table->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td>
                        <form action="{{ route('table.destroy',$table->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                  </tr>

                @endforeach


            </tbody>
          </table>


    </div>

  </div>

</div>

@endsection
