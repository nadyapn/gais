@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
				<li><a href="{{url('/sfSpecialMenu')}}">Shared Facilites Special Menu</a></li>
				<li class="active">List of Facilities</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
						<h2>Dashboard Shared Facilities Scheduler</h2>
						<h4>List of Facilities</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for list of Facilities -->
	<div class="row">
	<div style="margin-top:15px; margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
				<tr>
					<th>Facility</th>
					<th>Category</th>
					<th>Description</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sf as $e)
					<tr>
						<th>{{$e->sfname}}</th>
						<td>{{$e->category}}</td>
						<td>{{$e->description}}</td>
						<td><a href="{{url('/deleteFacility/'.$e->kode)}}" onclick="return confirm('Are you sure?')" class="btn btn-delete">Delete</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>
@endsection
