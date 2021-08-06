@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">
    @include('management.inc.sidebar')
    <div class="col-12 col-md-8 p-2">
        <h6>Edit Table</h6>
        <hr>

        <form action="{{ route('table.update',$table->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cat_name">Table Name</label>
                <input type="text" name="name" id="" value="{{$table->name}}" class="form-control">
                @error('name')
                <span class="error"  style="color: #bd2c12">{{ $message }}</span>
                @enderror
            </div>



            <button class="btn btn-primary">Edit</button>

        </form>

    </div>
  </div>

</div>

@endsection
