@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
				<li class="active">Overtime Log</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
						<h2>Log of Overtime</h2>
						<h4>List of Overtime Request for Admin</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
	<!-- Table for Overtime Log -->
	<div style="margin-top:15px; margin-left:30px" class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTable">
			<thead>
				<tr>
					<th>Requested ID</th>
					<th>Requested Date</th>
					<th>Employee's ID</th>
					<th>Employee's Name</th>
					<th>Status</th>
					<th>View Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ot as $e)
				<tr>
					<th scope="row">{{$e->kodeSS}}</th>
					<td>{{$e->request_date}}</td>
					<td>{{$e->id_employee}}</td>
					<td>{{$e->name}}</td>
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
					  <a href="{{url('/getDetailAdmin/'.$e->kodeSS)}}" class="btn btn-view">
					    View
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>
@endsection
