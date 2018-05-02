@extends('dashboard.layouts.main')

@section('page-name')
    <li class="breadcrumb-item active">
        <a href="{{ url('/work') }}">Work</a>
    </li>
    <li class="breadcrumb-item active">
        {{$work->name}}
    </li>

@endsection

@section('content')
    <form id="deleteWorkForm"
          name="deleteWorkForm" class="form-inline"
          action="{{ url("/work/delete",$work["id"]) }}"
          method="get"></form>
    <form class="col-md-12 form-horizontal"  action="{{ url('/work/update',$work["id"]) }}" method="post" enctype="multipart/form-data">
        <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
            <legend>Edit Work</legend>

            <hr/>
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="description_of_work">Description of Work</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="description_of_work" name="description_of_work" placeholder="Description of Work" >{{ $work->description }}</textarea>
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="contractor_name">Contractor Name</label>
                <div class="col-md-4">
                    <input id="contractor_name" name="contractor_name" type="text" placeholder="Contractor Name" class="form-control input-md" required="" value="{{ $work->contractor }}">

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="work_place">Work Place</label>
                <div class="col-md-4">
                    <input id="work_place" name="work_place" type="text" placeholder="Work Place" class="form-control input-md" required="" value="{{ $work->work_place }}">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="labour">Labour</label>
                <div class="col-md-4">
                    <input id="labour" name="labour" type="text" placeholder="number of labour" required="" class="form-control input-md" value="{{ $work->labour }}">

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="mason">Mason</label>
                <div class="col-md-4">
                    <input id="mason" name="mason" type="text" placeholder="number of mason" required="" class="form-control input-md" value="{{ $work->mason }}">

                </div>
            </div>


            <!-- File Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="mason">Check to Delete Image: </label><br/>

                @foreach($images as $image)
                    <div  class="image-container-edit">

                        <img src="{{ url('file/get', $image['name'])}}" style="height:130px ;width: auto"/>


                        <label class="container-chk container-chk-red" style="float:left">
                            <input name="image_to_delete[]" type="checkbox" value="{{ $image['id'] }}">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                @endforeach
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="work_image[]">Work Image</label>
                <div class="col-md-4">
                <span>
                    <input id="work_image" name="work_image[]"  type="file" multiple>
                    <span class="input-group-btn">
                        <button class="btn btn-success btn-add" type="button">
                            <span > Add New </span>
                        </button>
                    </span>
                </span>
                </div>
            </div>

            <div class="row" id="image_preview"></div>

            <div class="form-group ">
                <label class="col-md-4 control-label">Port</label>
                <div class="col-md-4">
                    <select class="form-control" name="port_id">
                   @foreach($ports as $f)
                            <option value="{{ $f['id'] }}"  }}
                                @if($port->id == $f['id'])
                                        selected
                                @endif
                            >
                                {{ $f['name'] }}
                            </option>
                        @endforeach

                    </select>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="remark">Remark</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="description_of_work" name="remark" placeholder="...">{{ $work->remark }}</textarea>
                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit"
                            type="submit"
                            name="submit" class="btn btn-primary">Update</button>




                        <input id="submit_delete"
                               name="delete"
                               type="submit"
                               class="btn btn-danger"
                               onclick="return confirm('Are You Sure?')"
                               form="deleteWorkForm"
                               value="Delete"
                        />




                </div>
            </div>




        </fieldset>
    </form>
    <br/>
    <br/>
@endsection

@section('extra-js')
    <script>
        $(function()
        {
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();



                var htmlString = "<span><input id='work_image' name='work_image[]'  type='file' multiple>\
                    <span class='input-group-btn'>\
                    <button class='btn btn-success btn-add' type='button'>\
                    <span > Add New </span>\
                    </button>\
                    </span></span>"

                $(this).parent().parent().parent().append(htmlString);

                $(this).parent().html("<button class='btn btn-danger btn-remove' type='button'>\
                    <span >Delete</span>\
                    </button><br/><br/>")

            }).on('click', '.btn-remove', function(e)
            {
                $(this).parent().parent().html("");

                e.preventDefault();
                return false;
            });
        });
    </script>
@endsection