@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">
    @include('management.inc.sidebar')
    <div class="col-12 col-md-8 p-2">
        <h6>Create Category</h6>
        <hr>

        <form action="{{ route('category.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cat_name">Category Name</label>
                <input type="text" name="category" id="" class="form-control">
                @error('category')
                <span class="error"  style="color: #bd2c12">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary">Save</button>

        </form>

    </div>
  </div>

</div>

@endsection
