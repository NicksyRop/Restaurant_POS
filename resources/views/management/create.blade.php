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
    <div class="col-12 col-md-8 p-2">
        <h6>Create Category</h6>
        <hr>

        <form action="{{ route('category.store')}}" method="POST">
            <div class="form-group">
                <label for="cat_name">Category Name</label>
                <input type="text" name="category" id="" class="form-control">
            </div>

            <button class="btn btn-primary">Save</button>

        </form>

    </div>
  </div>

</div>

@endsection
