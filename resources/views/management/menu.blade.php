@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    @include('management.inc.sidebar')
    <div class="col-12 col-md-8 p-2">
        <h6>Category</h6>
        <a href="{{ route('menu.create')}}" class="btn btn-success"> <i class="fas fa-plus mr-3"></i>Create Menu</a>
        <hr>
        <table class="table table-bordered table-dark mt-3">
            <thead>
              <tr>
                <th class="col">Id</th>
                <th scope="col">Name</th>
                <th class="col">Price</th>
                <th scope="col">Picture</th>
                <th class="col">Category</th>
                <th scope="col">Descriprion</th>
                <th class="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <th scope="row">{{ $menu->id}}</th>
                    <td>{{$menu->menu}}</td>
                    <td>{{$menu->price}}</td>
                    <td>
                        <img src="{{asset('menu_images')}}/{{$menu->image}}" class="img-fluid" alt="Image manu">
                    </td>
                    <td>{{$menu->category->category}}</td>
                    <td>{{$menu->description}}</td>
                    <td><a href="{{ route('menu.edit',$menu->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td>

                        <form action="{{route('menu.destroy',$menu->id)}}" method="POST">
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
