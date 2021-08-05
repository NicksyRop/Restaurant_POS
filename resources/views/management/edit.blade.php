@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    @include('management.inc.sidebar')
    <div class="col-12 col-md-8">
        <h4>Edit Category</h4>
        <hr class="my-4">

        <form action="{{route('category.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cat-name">Category</label>
                <input type="text" name="category" id="" value="{{ $category->category}}" class="form-control">

                @error('category')
                <span class="error"  style="color: #bd2c12">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>

</div>

@endsection
