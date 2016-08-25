@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

<!-- For Detailed Shared Facilities Scheduler -->
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li><a href="{{url('/getMyPeminjaman')}}">Shared Facilities History</a></li>
				<li class="active">Shared Facilities Detailed Request</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Detail of Shared Facilities</h2>
				<h4>A detailed look of Shared Facilities Request</h4>
			</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Overtime -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
				<tr>
				    <th>Requested ID</th>
				    <td>{{$peminjaman->kodePinjam}}</td>
				</tr>
				<tr>
				    <th>Employee's Name</th>
				    <td>{{$peminjaman->name}}</td>
				</tr>
				<tr>
				    <th>Facility's Name</th>
				    <td>{{$peminjaman->sfname}}</td>
				</tr>
				<tr>
					<th>Start Time</th>
					<td>{{$peminjaman->time_start}}</td>
				</tr>
				<tr>
					<th>End Time</th>
					<td>{{$peminjaman->time_end}}</td>
				</tr>
				<tr>
					<th>Description</th>
					<td>{{$peminjaman->description}}</td>
				</tr>
				<tr>
					<th>Status</th>
					<td>
						@if($peminjaman->status == 0) 
							Booked 
						@elseif($peminjaman->status == 1) 
							Waiting List 
						@elseif($peminjaman->status == -1) 
							Canceled 
						@endif
					</td>
				<tr>
					<th>Requested Date</th>
					<td>{{$peminjaman->request_date}}</td>
				</tr>
		</table>
	</div>
	
</div>
</div>
	<!-- End of Overtime-->
<!-- End of IF-->
@endsection
