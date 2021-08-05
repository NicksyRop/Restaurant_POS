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
        <h6>Category</h6>
        <a href="{{ route('category.create')}}" class="btn btn-success"> <i class="fas fa-plus mr-3"></i>Create Category</a>
        <hr>
        <table class="table table-bordered table-dark mt-3">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id}}</th>
                    <td>{{$category->category}}</td>
                    <td><a href="{{ route('category.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                    <td>
                        <form action="{{ route('category.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                          <Button class="btn btn-danger">Delete</Button>
                        </form>
                    </td>
                  </tr>

                @endforeach


            </tbody>
          </table>
          {{ $categories->links()}}

    </div>

  </div>

</div>

@endsection
