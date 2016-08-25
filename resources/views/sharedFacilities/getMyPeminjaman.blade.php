@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active"><a>Shared Facilities History</a></li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
						<h2>Shared Facilities Request History</h2>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for History SF -->
	<div class="row">
		<div style="margin-top:15px; margin-left:30px" class="table-responsive">
			<table class="display table">
				<thead>
					<tr>
						<th>Requested Date</th>
						<th>Facility</th>
						<th>Status</th>
						<th>View Detail</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($peminjaman as $e)
					<tr>
						<td>{{$e->request_date}}</td>
						<td>{{$e->sfname}}</td>
						<td>
							@if($e->status == 0)
								Booked
							@elseif($e->status == 1)
								Waiting List
							@elseif($e->status == -1)
								Canceled
							@endif
						</td>
						<td><a href="{{url('/getDetailPeminjaman/'.$e->kodePinjam)}}" class="btn btn-view">View</td>
						<td><a href="{{url('/deletePeminjaman/'.$e->kodePinjam)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
