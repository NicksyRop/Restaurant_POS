@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" id="table-details"></div>
<div class="row">
    <div class="col d-flex justify-content-center">
        <button class="btn btn-primary " id="btn-show-tables">View All Tables</button>
    </div>

</div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){

    $('#btn-show-tables').click(function(){
        $.get("/cashier/gettables",function(data){
            $('#table-details').html(data)
        })

    })
    })
</script>
@endsection

