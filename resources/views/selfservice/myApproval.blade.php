@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

<!-- Approval for Team Leader-->
@if(\Auth::user()->position === 'Team Leader')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li><a href="#" class="active">My Approval</a></li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>My Approval</h2>
							<h4>List of Self-service Request</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Approval for Team Leader -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
				<tr>
					<th>Requested ID</th>
					<th>Type</th>
					<th>Requested Date</th>
					<th>Employee's Name</th>
					<th>Status</th>
					<th>View Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ss as $e)
				<tr>
					<th scope="row">{{$e->kodeSS}}</th>
					<td>{{$e->tipe}}</td>
					<td>{{$e->request_date}}</td>
					<td>{{$e->name}}</td>
					<td>
						@if ($e->status == 0)
							Not approved yet by Supervisor
						@elseif ($e->status == 1)
							Approved by Supervisor
						@elseif ($e->status == 2)
							@if($e->tipe === 'Paid Leave')
								Approved by HR
							@else
								Approved by Business Unit
							@endif
						@elseif ($e->status == -1)
							Canceled by Employee
						@elseif ($e->status == 3)
							Rejected by Supervisor
						@elseif ($e->status == 4)
							@if($e->tipe === 'Paid Leave')
								Rejected by HR
							@else
								Rejected by Business Unit
							@endif
						@endif
					</td>
					<td>
					  <a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">
					    View
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>

<!-- End of Approval for Team Leader-->

<!-- Approval for Business Unit -->
@elseif(\Auth::user()->position === 'Head of Business Unit')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li><a href="#" class="active">My Approval</a></li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>My Approval</h2>
							<h4>List of Reimbursement & Overtime Request</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Approval for Business Unit -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
				<tr>
					<th>Requested ID</th>
					<th>Type</th>
					<th>Requested Date</th>
					<th>Employee's Name</th>
					<th>Status</th>
					<th>View Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ss as $e)
				<tr>
					<th scope="row">{{$e->kodeSS}}</th>
					<td>{{$e->tipe}}</td>
					<td>{{$e->request_date}}</td>
					<td>{{$e->name}}</td>
					<td>
						@if ($e->status = 0)
							Not approved yet by Supervisor
						@elseif ($e->status = 1)
							Approved by Supervisor
						@elseif ($e->status = 2)
							Approved by Business Unit
						@elseif ($e->status = -1)
							Canceled by Employee
						@endif
					</td>
					<td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>

<!-- End of Approval for Business Unit-->

<!-- Approval for Head of HR Unit -->
@elseif(\Auth::user()->position === 'Head of HR')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li><a href="#" class="active">My Approval</a></li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>My Approval</h2>
				<h4>List of Paid Leave Request</h4>
			</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Approval for Head of HR Unit -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
				<tr>
					<th>Requested ID</th>
					<th>Requested Date</th>
					<th>Employee's Name</th>
					<th>Status</th>
					<th>View Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ss as $e)
				<tr>
					<th scope="row">{{$e->kodeSS}}</th>
					<td>{{$e->request_date}}</td>
					<td>{{$e->name}}</td>
					<td>
						@if ($e->status = 0)
							Not approved yet by Supervisor
						@elseif ($e->status = 1)
							Approved by Supervisor
						@elseif ($e->status = 2)
							Approved by Business Unit
						@elseif ($e->status = -1)
							Canceled by Employee
						@endif
					</td>
					<td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>

<!-- End of Approval for Head of HR Unit-->

@endif
<!-- End of IF-->


@endsection
