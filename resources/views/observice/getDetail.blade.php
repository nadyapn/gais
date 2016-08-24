@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

<!-- For Detailed Shared Facilities Scheduler -->
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li><a href="{{url('/getMyOBService')}}">OB Service History</a></li>
				<li class="active">OB Request Detailed Request</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Detail of OB Service</h2>
							<h4>A detailed look of OB Service Request</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Overtime -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTable">
				<tr>
								<td>Request ID</td>
								<td>{{$obs->kodeOBS}}</td>
							</tr>
							<tr>
								<td>Employee's Name</td>
								<td>{{$em_name->name}}</td>
							</tr>
							<tr>
								<td>OB's Name</td>
								<td>{{$ob_name->name}}</td>
							</tr>
							<tr>
								<td>Requested date</td>
								<td>{{$obs->date}}</td>
							</tr>
							<tr>
								<td>Batch</td>
								<td>{{$obs->batch}}</td>
							</tr>
							<tr>
								<td>Category</td>
								<td>{{$obs->category}}</td>
							</tr>
							<tr>
								<td>Description</td>
								<td>{{$obs->detail}}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>
									@if ($obs->status == 0)
										Waiting for OB's approval
									@elseif ($obs->status == 1)
										Approved by OB
									@elseif ($obs->status == 2)
										Rejected by OB
									@elseif ($obs->status == 3)
										Request is done
									@endif
								</td>
							</tr>
		</table>
	</div>
</div>
</div>
	<!-- End of Overtime-->
<!-- End of IF-->
@endsection






