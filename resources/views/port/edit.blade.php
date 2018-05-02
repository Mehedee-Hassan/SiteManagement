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
    <div class="col-lg-12">
        <form class="col-md-12 form-horizontal" action="{{ url('/port/'.$port->id.'/update') }}">
            <fieldset>

                <!-- Form Name -->
                <legend>Create Port</legend>

                <hr/>

                <!-- Text input-->
                <div class="form-group">
                        <label class="col-md-4 control-label" for="contractor_name">Port Name</label>
                    <div class="col-md-4">
                        <input id="port_name" name="port_name" type="text" placeholder="Port Name" class="form-control input-md" required="" value="{{ $port->name }}">
                    </div>
                </div>



                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>


            </fieldset>
        </form>



    </div>

@endsection