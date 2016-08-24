@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Overtime History</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Overtime History</h2>
							<h4>A detailed look of your Overtime history</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
	<!-- Table for My History -->
	<div style="margin-top:15px; margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
				<tr>
					<th>Requested ID</th>
					<th>Requested Date</th>
					<th>Status</th>
					<th>View Details</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ot as $e)
				<tr>
					<th scope="row">{{$e->kodeSS}}</th>
					<td>{{$e->request_date}}</td>
					<td>
					  @if ($e->status == 0)
						Not approved yet by Supervisor
										@elseif ($e->status == 1)
											Approved by Supervisor
										@elseif ($e->status == 2)
											Approved by Business Unit
										@elseif ($e->status == -1)
											Canceled by Employee
										@elseif ($e->status == 3)
											Rejected by Supervisor
										@elseif ($e->status == 4)
											Rejected by Business Unit
							@endif
					</td>
					<td>
					  <a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">
					    View
					</td>
					<td>@if ($e->status == 0)<a href="{{url('/update/'.$e->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
					<td>@if ($e->status == 0)<a href="{{url('/delete/'.$e->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>
@endsection
