
@extends('dashboard.layouts.main')

@section('page-name')
	<li class="breadcrumb-item active">
		<a href="{{ url('/work') }}">Work</a>
	</li>

@endsection

@section('content')

	<div class="col-lg-12">

		<table class="table table-bordered">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Description of Work</th>
				<th scope="col">Contractor Name</th>
				<th scope="col">Work Place</th>
				<th scope="col">Work Site No. of labour</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				@foreach($works as $work)
					<tr>
						<th scope="row"><?php echo $i; ?></th>
						<td>{{$work->description}}</td>
						<td>{{$work->contractor}}</td>
						<td>{{$work->work_place}}</td>
						<td >Mason = {{$work->mason}} <br/> Labour = {{$work->labour}}</td>
						<td class="text-center">
							<a class="btn btn-warning btn-add" href="{{ url('/work',$work->id) }}">
								<i class="fa fa-edit"></i>
							</a>
							<a class="btn btn-danger btn-add" href="{{ url('/work/delete',$work->id) }}"
									onclick="return confirm('Are You Sure?')"
							>
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
                    <?php $i++; ?>
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