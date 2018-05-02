
@extends('dashboard.layouts.main')

@section('page-name')
	<li class="breadcrumb-item active">
		<a href="{{ url('/port') }}">Port</a>
	</li>

@endsection

@section('content')

	<div class="col-lg-12">

		<table class="table table-bordered">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Port Name</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
            <?php $i = 1 ;?>
			@foreach($ports as $port)
			<tr>
				<th scope="row"><?php echo $i;?></th>
				<td>{{$port->name}}</td>

				<td class="text-center">
					<a class="btn btn-warning btn-add" href="{{ url('/port/'.$port->id.'/edit') }}">
						<i class="fa fa-edit"></i>
					</a>
					<a class="btn btn-danger btn-add" href="{{ url('/port/delete',$port->id) }}"
					   onclick="return confirm('Are You Sure?')"
					>
						<i class="fa fa-trash"></i>
					</a>
				</td>


			</tr>
            <?php $i++;?>

			@endforeach

			</tbody>
		</table>

	{{--@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )--}}
	</div>
<script>
//	$(".editable").editable({ajaxOptions:{method:'PUT'}});

	$(document).ready(function() {
    	$('#table-1').DataTable();
    } );
</script>
@endsection