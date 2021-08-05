@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row mt-5">
                <div class="col-12 col-md-4 mb-4 border border-1">
                    <h4>Data Managent</h4>
                    <img src="{{ asset('images/folder-management.svg')}}" class="img-fluid" alt="Data management image">
                </div>
                <div class="col-12 col-md-4 mb-4 border border-1">
                    <h4>Cashier</h4>
                    <img src="{{ asset('images/cashier.svg')}}" class="img-fluid" alt="Cashier Image">
                </div>
                <div class="col-12 col-md-4 mb-4 rounded border border-1">
                    <h4>Report</h4>
                    <img src="{{ asset('images/report.svg')}}" class="img-fluid" alt="Report image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
