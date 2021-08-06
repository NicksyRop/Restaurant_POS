@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col d-flex justify-content-center">
        <button class="btn btn-primary " id="btn-show-tables">View All Tables</button>
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
        })


       }else{
        $('#table-details').slideUp('fast')

       }

    })
    })
</script>
@endsection

