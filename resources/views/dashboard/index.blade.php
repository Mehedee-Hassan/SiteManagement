
@extends('dashboard.layouts.main')

@section('page-name')
        <li class="breadcrumb-item active">My Dashboard</li>
    @endsection

@section('content')


    <div class="container-fluid col-md-12">

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-6">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <img style="height: 30%;width: 30%; float: right; " src="{{ asset("image/boat-from-front-view.png") }}">
                        </div>
                        {{--<div class="mr-5"><h3>{{ $number_of_ports }}</h3> Ports</div>--}}
                        <div class="mr-5"><h3>{{ $portCount }}</h3> Ports</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/port') }}#">
                        <span class="float-left">View Details</span>
                     <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6 mb-6">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <img style="height: 30%;width: 30%; float: right; " src="{{ asset("image/excavator.png") }}">
                        </div>
{{--                        <div class="mr-5"><h3>{{ $number_work }}</h3> Works</div>--}}
                        <div class="mr-5"><h3>{{ $workCount }}</h3> Works

                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/work') }}">
                        <span class="float-left">View Details</span>

                    </a>
                </div>
            </div>

        </div>
        <!-- Area Chart Example-->
        <br/> <br/> <br/> <br/> <br/>
        <h1><span class="badge badge-warning">Work Images</span></h1>
        <a class="btn btn-sm btn-info " href="{{ url('/dashboard/images/1/1') }}">See All By Date   <i class="fa fa-external-link"></i></a>
        <a class="btn btn-sm btn-primary " href="{{ url('/dashboard/images/1/3') }}">See All By Works   <i class="fa fa-external-link"></i></a>
<hr/>
        <div class="row">

            <div class="col-xl-12 col-sm-12 mb-12">

                    <div class="row work-image-container">
                @foreach($update_dates as $ud1)
                    @foreach($ud1 as $ud)

                        <a class="col-xl-2 col-sm-2 mb-2 text-center" href="{{ url("/dashboard/images/".$ud."/2") }}">
                            <img style="height: 100%;width: 50%; " src="{{ asset("image/folder.png") }}">
                            <br/>
                                <h3  class="badge badge-pill badge-info">{{ \Carbon\Carbon::parse($ud)->format('d-m-Y') }}</h3>
                            <br/>
                        </a>

                    @endforeach
                @endforeach
                    </div>
           </div>

        </div>



@endsection