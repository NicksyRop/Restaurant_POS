@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">
    @include('management.inc.sidebar')
    <div class="col-12 col-md-8 p-2">
        <h6>Edit Menu</h6>
        <hr class="my-4">

        <form action="{{ route('menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cat_name">Menu Name</label>
                <input type="text" name="menu" id="" class="form-control" value="{{$menu->menu}}">
                @error('menu')
                <span class="error"  style="color: #bd2c12">{{ $message }}</span>
                @enderror
            </div>

            <label for="price">Price</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" name="price" value="{{$menu->price}}" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
                @error('price')
                <span class="error"  style="color: #bd2c12">{{ $message }}</span>
                @enderror

            </div>



            <div class="form-group">
                <label for="cat_name">Menu Image</label>
                <input type="file" name="image" value="{{$menu->image}}" id="" class="form-control">
                @error('image')
                <span class="error"  style="color: #bd2c12">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="cat_name">Menu Descriprion</label>
                <input type="text" name="description" id="" class="form-control" class="custom-file-input" value="{{$menu->description}}">
                @error('name')
                <span class="description"  style="color: #bd2c12">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cat_name">Category</label>
                <select name="category_id" id="" class="form-control">
                   @foreach ($categories as $cat)

                        <option value="{{ $cat->id}}">{{$cat->category}}</option>

                   @endforeach
                </select>


            </div>

            <button class="btn btn-primary">Edit</button>

        </form>

    </div>
  </div>

</div>

@endsection
