@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-6">
        <button class="btn btn-primary " id="btn-show-tables">View All Tables</button>
    </div>
    <div class="col-6">
        <ul class="nav nav-tabs ">

            @foreach ($categories as $cat)
            <li class="nav-item">
                <a class="nav-link" href="#" data-id={{$cat->id}}>{{$cat->category}}</a>
              </li>
            @endforeach



          </ul>
    </div>


</div>
<div class="row mt-3" id="table-details"></div>

</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        //make div invisible by default

        $('#table-details').hide();

        $('#btn-show-tables').click(function(){

       if( $('#table-details').is(":hidden")){

        $.get("/cashier/gettables",function(data){
            $('#table-details').html(data)
            $('#table-details').slideDown('fast')
            $('#btn-show-tables').html('Hide Tables').removeClass('btn btn-primary').addClass('btn btn-danger')

        })


       }else{
        $('#table-details').slideUp('fast')
        $('#btn-show-tables').html('Show Table').removeClass('btn btn-danger').addClass('btn btn-success')

       }

    })
    })
</script>
@endsection

