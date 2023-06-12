@extends('admin.components.master')

@section('content')

    <!-- pageheader  -->
    @section('page_title')
        Dashboard
    @endsection

    @section('page_name')
        Home
    @endsection
    <!-- end pageheader  -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <h5 class="card-header">Dashboard</h5>
                <div class="card-body">

                    @include('admin.includes.message')

                </div>
            </div>
        </div>
    </div>
@endsection


