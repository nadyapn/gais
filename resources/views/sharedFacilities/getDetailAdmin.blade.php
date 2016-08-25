@extends('user.sidebarAdmin')
@section('contentAdmin')

<!-- For Detailed Shared Facilities Scheduler -->
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
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
				    <td>Facility's Name</td>
				    <td>{{$peminjaman->sfname}}</td>
				</tr>
				<tr>
					<td>Start Time</td>
					<td>{{$peminjaman->time_start}}</td>
				</tr>
				<tr>
					<td>End Time</td>
					<td>{{$peminjaman->time_end}}</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>{{$peminjaman->description}}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>
						@if($peminjaman->status == 0) Booked @elseif($peminjaman->status == 1) Waiting List @elseif($peminjaman->status == -1) Canceled @endif
					</td>
				<tr>
					<td>Requested Date</td>
					<td>{{$peminjaman->request_date}}</td>
				</tr>
		</table>
	</div>
	@else
		Not found
	@endif
</div>
</div>
	<!-- End of Overtime-->
<!-- End of IF-->
@endsection
