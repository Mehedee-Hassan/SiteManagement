
@extends('dashboard.layouts.main')

@section('page-name')
	<li class="breadcrumb-item active">
		Users
	</li>

@endsection

@section('content')

	<div class="col-lg-12">

		<table class="table table-bordered">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">User Name</th>
				<th scope="col">Role</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
            <?php $i = 1 ;?>
			@foreach($users as $user)
			<tr>
				<th scope="row"><?php echo $i;?></th>
				<td>{{$user->name}}</td>
				<td>
					@if($user->role == 'superadmin')
							Super Admin
					@elseif($user->role == 'admin')
							Admin
					@else
						No Access
						@endif


				</td>

				<td class="text-center">
					<a class="btn btn-warning btn-add" href="{{ url('/user/'.$user->id.'/edit') }}">
						<i class="fa fa-edit"></i>
					</a>
					<a class="btn btn-danger btn-add" href="{{ url('/user/'.$user->id.'/delete') }}"
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