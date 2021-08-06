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
                {{-- @foreach ($tables as $table) --}}
                <tr>
                    <th scope="row">1</th>
                    <td>table</td>
                    <td>empty</td>
                    <td> edit</td>
                    <td>Delete</td>
                  </tr>

                {{-- @endforeach --}}


            </tbody>
          </table>


    </div>

  </div>

</div>

@endsection
