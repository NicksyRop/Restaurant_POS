@extends('layouts.app')

@section('content')

    <div class="container  align-items-center">
        <div class="row d-flex">
          <div class="col-12">
              <ul class="list-goup-item">
                  <li class="list-group-item"><a href="/managent/category"><i class="fas fa-bars mr-3"></i>Category</a></li>
                  <li class="list-group-item"><a href="{{ route('menu.index')}}"> <i class="fas fa-hamburger mr-3"></i> Menu</a></li>
                  <li class="list-group-item"><a href=""><i class="fas fa-user mr-3"></i>User</a></li>
                  <li class="list-group-item"><a href="{{ route('table.index')}}"><i class="fas fa-table mr-3"></i>Table</a></li>

              </ul>
          </div>

        </div>

      </div>

@endsection

@section('css')
<style>
    body{
        background-image: url('{{ asset('images/hotel.jpg')}}');

         min-height : 100%;
        background-repeat :no-repeat;



    }
    </style>


@endsection
