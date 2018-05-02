<form class="col-md-12 form-horizontal"  action="{{ url('/report/generate') }}" method="get">
    <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
        <legend>Create Report</legend>

            <hr/>

        <div class="form-group ">
            <label class="col-md-4 control-label">Select Port</label>
            <div class="col-md-4">
                <select class="form-control" name="port_id">

                    @foreach($ports as $f)
                        <option value="{{ $f->id }}"  }}>
                            {{ $f->name }}
                        </option>
                    @endforeach

                </select>

            </div>
        </div>




            <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary">Create</button>
            </div>
        </div>




    </fieldset>
</form>

