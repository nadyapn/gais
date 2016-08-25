@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
				<li class="active">Shared Facilities Log</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
						<h2>Log of Shared Facilities</h2>
						<h4>List of Shared Facilities Request for Admin</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Log SF -->
	<div class="row">
		<div style="margin-top:15px; margin-left:30px" class="table-responsive">
			<table class="display table">
				<thead>
					<tr>
						<th>Requested ID</th>
						<th>Requested Date</th>
						<th>Facility</th>
						<th>Status</th>
						<th>View Detail</th>
					</tr>
				</thead>
				<tbody>
					@foreach($peminjaman as $e)
					<tr>
						<td>{{$e->kodePinjam}}</td>
						<td>{{$e->name}}</td>
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
						<td><a href="{{url('/getDetailAdminPeminjaman/'.$e->kodePinjam)}}" class="btn btn-view">View</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
