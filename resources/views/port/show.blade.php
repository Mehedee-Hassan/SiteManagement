@extends('dashboard.layouts.main')

@section('page-name')
    <li class="breadcrumb-item active">
        <a href="{{ url('/port') }}">Port</a>
    </li>
    <li class="breadcrumb-item active">
        {{$port->name}}
    </li>

@endsection

@section('content')


    {{--<h2>{{$port->name}}</h2>--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}

       {{----}}
            {{--</div>--}}

        {{--<div class="col-md-6">--}}

        {{--</div>--}}
    {{--</div>--}}

    <div class="col-lg-12 shwo-view">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Summary</div>
                    <div class="panel-body">

                        <div class="list-group-item">
                            <h4>Land Area</h4>
                            @if($port->land_area ==null)
                                <p class="light-grey"> empty !!</p>
                            @else
                                <h5>{{$port->land_area}}</h5>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Storage Capacity</h4>
                            @if($port->storage_capacity == null)
                                <p class="light-grey"> empty !!</p>
                            @else
                            <h5>{{$port->storage_capacity}}</h5>
                            @endif
                        </div>

                        <div class="list-group-item">
                            <h4>Signing Details</h4>
                            @if($port->signing_details ==null)
                                <p class="light-grey"> empty !!</p>
                            @else
                            <h5>{{$port->signing_details}}</h5>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Royalty Operation</h4>
                            @if($port->royalty_operation ==null)
                                <p class="light-grey"> empty !!</p>
                            @else
                            <h5>{{$port->royalty_operation}}</h5>
                                @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Operator</h4>
                            @if($port->operator ==null)
                                <p class="light-grey"> empty !!</p>
                            @else
                                <h5>{{$port->operator}}</h5>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Operator Description</h4>
                            @if($port->operator_description ==null)
                                <p class="light-grey"> empty !!</p>
                            @else
                                 <h5>{{$port->operator_description}}</h5>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Dates</div>
                    <div class="panel-body">

                        <div class="list-group-item">
                            <h4>Date Of Operation</h4>
                            <h5>
                                {{ \Carbon\Carbon::parse($port->date_of_operation)->format('d/m/Y')}}
                            </h5>
                        </div>
                        <div class="list-group-item">
                            <h4>Date Of Declaration</h4>
                            <h5>
                                {{ \Carbon\Carbon::parse($port->date_of_declaration)->format('d/m/Y')}}
                            </h5>
                        </div>
                        <div class="list-group-item">
                            <h4>Date Commercial Operation</h4>
                            <h5>
                                {{ \Carbon\Carbon::parse($port->date_commercial_operation)->format('d/m/Y')}}
                            </h5>
                        </div>
                        <div class="list-group-item">
                            <h4>Date Of Signing</h4>
                            <h5>
                                {{ \Carbon\Carbon::parse($port->date_of_signing)->format('d/m/Y')}}
                            </h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Lists

                    </div>
                    <div class="panel-body">
                        <div class="list-group-item">
                            <h4>Facilities</h4>
                            @if(count($facility) <= 0)
                                <p class="light-grey"> empty !!</p>
                            @else
                            <ol class="myList">
                                @foreach($facility as $f)
                                    <li> {{ $f['name']}}
                                       <h5 class="d-inline-block">
                                           <span class="badge badge-pill badge-success">{{  number_format($f['pivot']['amount'],2)}}</span>
                                       </h5>
                                    </li>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4 class="">Infrastructure</h4>
                            @if(count($infrastructures) <= 0)
                                <p class="light-grey"> empty !!</p>
                            @else
                            <ol class="myList">
                                @foreach($infrastructures  as $f)
                                   <li> {{ $f['name']  }}
                                       <h5 class="d-inline-block">

                                        <span class="badge badge-pill badge-warning">{{  number_format($f['pivot']['amount'],2)}}</span>
                                       </h5>
                                   </li>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4 class="">Exports Item</h4>
                            @if(count($exports) <= 0)
                                <p class="light-grey"> empty !!</p>
                            @else
                            <ol class="myList">
                                @foreach($exports as $f)
                                    <li> {{ $f['name']  }}</li>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Imports Item</h4>
                            @if(count($imports) <= 0)
                                <p class="light-grey"> empty !!</p>
                            @else
                                <ol class="myList">
                                    @foreach($imports as $f)
                                        <li> {{ $f['name']  }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                        <div class="list-group-item">
                                <a class="btn btn-group-sm badge-info pull-right" href="{{ url('/manpowrs-port-edit',$port) }}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    Edit
                                </a>
                            <h4>Manpower</h4>

                                @if(count($manpowers) <= 0)
                                    <p class="light-grey"> empty !!</p>
                                @else
                                    <ol class="myList">
                                        @foreach($manpowers as $f)
                                            <li> {{ $f['name']  }}
                                                <h5 class="d-inline-block">
                                                    <span class="badge badge-pill badge-danger">{{  number_format($f['pivot']['amount'],0)}}</span>
                                                </h5>
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif

                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Others</div>
                    <div class="panel-body">
                        <div class="list-group-item">
                            <h4>Problems</h4>
                            <h5>{{$port->problems}} </h5>
                                @if($port->problems == null)
                                   <p>empty  !!</p>
                                @endif

                        </div>
                        <div class="list-group-item">
                            <h4>Infrastructure Details</h4>
                            <h5>{{$port->infrastructure_details}}</h5>
                            @if($port->infrastructure_details == null)
                                <p>empty !!</p>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Comments</h4>
                            <h5>{{$port->comments}}</h5>
                            @if($port->comments == null)
                                <p>empty  !!</p>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <h4>Current Status</h4>
                            <h5>{{$port->current_status}}</h5>
                            @if($port->current_status  == null)
                                <p>empty  !!</p>
                            @endif
                        </div>


                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Handling capacity</div>
                    <div class="panel-body">
                        <div class="list-group-item">
                            <h4>Handling Capacity</h4>

                            @if(count($handlingcapacity) <= 0)
                                <p class="light-grey"> empty !!</p>
                            @else
                                <ol class="myList">
                                    @foreach($handlingcapacity as $f)
                                        <li> {{ $f['name']  }}
                                            <h5 class="d-inline-block">
                                                <span class="badge badge-pill badge-info">{{  number_format($f['pivot']['amount'],0)}}</span>
                                            </h5>
                                        </li>

                                    @endforeach

                                </ol>
                                <hr/>
                                <span> Total Handling Capacity
                                    <h5 class="d-inline-block">
                                        <span class="badge badge-pill badge-secondary">{{ $totalHandlingcapacity }}</span>
                                    </h5>
                                </span>
                            @endif

                        </div>

                    </div>

                </div>

        </div>
    </div>
@endsection