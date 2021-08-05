@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 col-md-4">
        <ul class="list-goup-item">
            <li class="list-group-item"><a href="/managent/category"><i class="fas fa-bars mr-3"></i>Category</a></li>
            <li class="list-group-item"><a href=""> <i class="fas fa-hamburger mr-3"></i> Menu</a></li>
            <li class="list-group-item"><a href=""><i class="fas fa-user mr-3"></i>User</a></li>
            <li class="list-group-item"><a href=""><i class="fas fa-table mr-3"></i>Table</a></li>

        </ul>
    </div>
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
