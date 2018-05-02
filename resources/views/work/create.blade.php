<form class="col-md-12 form-horizontal"  action="{{ url('/work') }}" method="post" enctype="multipart/form-data">
    <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
        <legend>Create Work</legend>

            <hr/>
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description_of_work">Description of Work</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description_of_work" name="description_of_work" placeholder="Description of Work"></textarea>
            </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contractor_name">Contractor Name</label>
            <div class="col-md-4">
                <input id="contractor_name" name="contractor_name" type="text" placeholder="Contractor Name" class="form-control input-md" required="">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="work_place">Work Place</label>
            <div class="col-md-4">
                <input id="work_place" name="work_place" type="text" placeholder="Work Place" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="labour" >Labour</label>
            <div class="col-md-4">
                <input id="labour" name="labour" type="text" placeholder="number of labour" class="form-control input-md" required>

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="mason">Mason</label>
            <div class="col-md-4">
                <input id="mason" name="mason" type="text" placeholder="number of mason" class="form-control input-md" required>

            </div>
        </div>


        <!-- File Button -->
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
                @if(count($ports) == 0)
                    <span class="text-danger">No port created yet <a href="{{ url('/port/create') }}" class="alert-info"> Click to Create Port</a></span>
                @endif

                <select class="form-control" name="port_id" required>


                    @foreach($ports as $f)
                        <option value="{{ $f->id }}"  }}>
                            {{ $f->name }}
                        </option>
                    @endforeach

                </select>

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="remark">Remark</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description_of_work" name="remark" placeholder="..."></textarea>
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