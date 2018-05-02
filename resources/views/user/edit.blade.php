@extends('dashboard.layouts.main')

@section('page-name')
    <li class="breadcrumb-item active">
        <a href="{{ url('/user') }}">User</a>
    </li>
    <li class="breadcrumb-item active">
        {{$user->name}}
    </li>

@endsection

@section('content')
    <div class="col-lg-12">
        <form class="col-md-12 form-horizontal" action="{{ url('/user/'.$user->id.'/update') }}">
            <fieldset>

                <!-- Form Name -->
                <legend>Update User Role</legend>

                <hr/>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="contractor_name">User Role</label>
                    <div class="col-md-4">
                        {{--<input id="user_name" name="user_name" type="text" placeholder="User Role" class="form-control input-md" required="" value="{{ $user->role }}">--}}

                        <select id="user_role" name="user_role" class="form-control input-md" >
                            <option value="superadmin"
                                @if($user->role == 'superadmin')
                                        selected
                                        @endif

                            >SuperAdmin</option>
                            <option value="admin"
                                    @if($user->role == 'admin')
                                    selected
                                    @endif
                            >Admin</option>
                            <option value="dummy"
                                   @if($user->role == 'dummy')
                                    selected
                                    @endif
                            >Stop Access</option>
                        </select>

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