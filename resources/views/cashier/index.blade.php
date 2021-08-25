@extends('layouts.app')

@section('content')

<div class="container">
<div class="row mt-3" id="table-details">

</div>

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
          <div id="menu-items" class="row mt-5">


          </div>
    </div>

</div>

<div id="selected-table">

</div>
<div id="order-detail">

</div>

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

    //ajax to load data for category clicked
    $('.nav-link').click(function(){

        $.get('/cashier/getCategoryMenus/'+$(this).data('id'),function(data){
            $('#menu-items').html(data)
        })
    })


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //load table details
    //specify the row then the table class
    //this means the selected button
    var SELECTED_TABLE_ID ="";
    var SELECTED_TABLE_NAME = "";
    $("#table-details").on('click',".btn-table",function(){

         SELECTED_TABLE_ID = $(this).data('id');
         SELECTED_TABLE_NAME = $(this).data('name');

        $('#selected-table').html('<br> <h3> Table : '+SELECTED_TABLE_NAME +'</h3> <hr>')
    })

    $('#menu-items').on('click',".btn-menu",function(){

        if( SELECTED_TABLE_ID === ""){

            alert('You first need to select a table for the customer')
        }else{

        //    / get the id of the selected menu
            var menu_id = $(this).data('id');

           // alert(menu_id)

            $.ajax({

                type:"GET",

                data : {
                    "menu_id" : menu_id,
                    "table_id": SELECTED_TABLE_ID,
                    "table_name" : SELECTED_TABLE_NAME,
                    "quantity" : 1
                },

                url : "/cashier/orderFood",
                success : function(data){

                   // console.log(data);

                    $('#order-detail').html(data);

                }

            })




        }
        location.reload(false);

    })

    })
</script>
@endsection

