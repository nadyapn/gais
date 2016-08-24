@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
				<li class="active">Office Boy Services Log</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
						<h2>Log of Office Boy Services</h2>
						<h4>List of Office Boy Services Request for Admin</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
	<!-- Table for Overtime Log -->
	<div style="margin-top:15px; margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
							<tr>
							  <th>Requested ID</th>
							  <th>Requested Date</th>
							  <th>Employee's Name</th>
							  <th>OB's Name</th>
							  <th>Status</th>
							  <th>View</th>
							</tr>
					  	</thead>
					  	<tbody>
							@foreach($obs as $e)
								<tr>
									<th>{{$e->kodeOBS}}</th>
								  	<th>{{$e->date}}</th>
								  	<th>{{$e->em_name}}</th>
								  	<th>{{$e->ob_name}}</th>
								  	<th>@if ($e->status == 0)
										Waiting for OB's approval
									@elseif ($e->status == 1)
										Approved by OB
									@elseif ($e->status == 2)
										Rejected by OB
									@elseif ($e->status == 3)
										Request is done
									@endif
									</th>
								  	<td><a href="{{url('/getDetailAdminOBS/'.$e->kodeOBS)}}" class="btn btn-view">View</td>
								</tr>
							@endforeach
						</tbody>
		</table>
	</div>
	</div>
</div>
@endsection

