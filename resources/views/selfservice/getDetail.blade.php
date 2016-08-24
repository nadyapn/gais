@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

<!-- For Detailed Reimburse -->
@if ($rm != "")
@if($rm->photo != "")  @endif
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Detailed Reimbursement History</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Reimbursement History <b> {{$ss->kodeSS}} </b> </h2>
							<h4>A detailed look of your Reimbursement history</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Reimburse -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Requested ID</th>
				<td> {{$ss->kodeSS}}</td>
			</tr>
			<tr>
				<th>Type</th>
				<td> Reimbursement</td>
			</tr>
			<tr>
				<th>Employee's Name</th>
				<td> {{$ss->name}}</td>
			</tr>
			<tr>
				<th>Category</th>
				<td> {{$rm->category}}</td>
			</tr>
			<tr>
				<th>Requested Date</th>
				<td> {{$ss->request_date}}</td>
			</tr>
			<tr>
				<th>Date of Reimbursement Event</th>
				<td> {{$rm->date}}</td>
			</tr>
			<tr>
				<th>Total Nominal of Reimbursement</th>
				<td> {{$rm->cost}}</td>
			</tr>
			<tr>
				<th>Business Purpose</th>
				<td> {{$rm->business_purpose}}</td>
			</tr>
			<tr>
				<th>Detail of Spending</th>
				<td> {{$ss->description}}</td>
			</tr>
			<tr>
				<th>Photo</th>
				<td> <img src="{{url('./foto/'.$rm->photo)}}" style="width:500px;"/></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					@if ($ss->status == 0)
						Not approved yet by Supervisor
					@elseif ($ss->status == 1)
						Approved by Supervisor
					@elseif ($ss->status == 2)
						Approved by Business Unit
					@elseif ($ss->status == -1)
						Canceled by Employee
					@elseif ($ss->status == 3)
						Rejected by Supervisor
					@elseif ($ss->status == 4)
						Rejected by Business Unit
					@endif
				</td>
			</tr>
			<tr>
				@if ($ss->status == 3 || $ss->status == 4)
				<th>Rejected because</th>
				<td> {{$ss->message}}</td>
				@endif
			</tr>
		</table>
	</div>
</div>
</div>

<!-- End of Reimburse-->

<!-- For Detailed Paid Leave -->
@elseif ($pl != "")
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Detailed Paid Leave History</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Paid Leave History <b> {{$ss->kodeSS}} </b> </h2>
							<h4>A detailed look of your Paid Leave history</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Paid Leave -->
	<div class="row">
	<div style="margin-left:30px" class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Requested ID</th>
				<td> {{$ss->kodeSS}}</td>
			</tr>
			<tr>
				<th>Type</th>
				<td>Paid Leave</td>
			</tr>
			<tr>
				<th>Employee's Name</th>
				<td> {{$ss->name}}</td>
			</tr>
			<tr>
				<th>Category</th>
				<td> {{$pl->category}}</td>
			</tr>
			<tr>
				<th>Requested Date</th>
				<td> {{$ss->request_date}}</td>
			</tr>
			<tr>
				<th>Paid Leave Start Date</th>
				<td> {{$pl->date_hired}}</td>
			</tr>
			<tr>
				<th>Period</th>
				<td> {{$pl->period_of_leave}}</td>
			</tr>
			<tr>
				<th>Total Leave</th>
				<td> {{$pl->total_leave}}</td>
			</tr>
			<tr>
				<th>Reason of Leave</th>
				<td> {{$ss->description}}</td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					@if ($ss->status == 0)
						Not approved yet by Supervisor
					@elseif ($ss->status == 1)
						Approved by Supervisor 
					@elseif ($ss->status == 2)
						Approved by HR 
					@elseif ($ss->status == -1)
						Canceled by Employee
					@elseif ($ss->status == 3)
						Rejected by Supervisor
					@elseif ($ss->status == 4)
						Rejected by HR
					@endif
				</td>
			</tr>
			<tr>
				@if ($ss->status == 3 || $ss->status == 4)
				<th>Rejected because</th>
				<td> {{$ss->message}}</td>
				@endif
			</tr>
		</table>
	</div>
</div>
</div>

<!-- End of Paid leave-->

<!-- For Detailed Overtime -->
@elseif ($ot != "")
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Detailed Overtime History</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Overtime History <b> {{$ss->kodeSS}} </b></h2>
				<h4>A detailed look of your Overtime history</h4>
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
				<td> {{$ss->kodeSS}}</td>
			</tr>
			<tr>
				<th>Type</th>
				<td>Overtime</td>
			</tr>
			<tr>
				<th>Employee's Name</th>
				<td> {{$ss->name}}</td>
			</tr>
			<tr>
				<th>Requested Date</th>
				<td> {{$ss->request_date}}</td>
			</tr>
			<tr>
				<th>Date of Overtime</th>
				<td> {{$ot->date}}</td>
			</tr>
			<tr>
				<th>Start Time</th>
				<td> {{$ot->time_start}}</td>
			</tr>
			<tr>
				<th>End Time</th>
				<td> {{$ot->time_end}}</td>
			</tr>
			<tr>
				<th>Reason of Overtime</th>
				<td> {{$ss->description}}</td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					@if ($ss->status == 0)
						Not approved yet by Supervisor
					@elseif ($ss->status == 1)
						Approved by Supervisor
					@elseif ($ss->status == 2)
						Approved by Business Unit
					@elseif ($ss->status == -1)
						Canceled by Employee
					@elseif ($ss->status == 3)
						Rejected by Supervisor
					@elseif ($ss->status == 4)
						Rejected by Business Unit
					@endif
				</td>
			</tr>
			<tr>
				@if ($ss->status == 3 || $ss->status == 4)
				<th>Rejected because</th>
				<td> {{$ss->message}}</td>
				@endif
			</tr>
		</table>
	</div>
	@else
		not found
	@endif
</div>
</div>
<!-- End of Overtime-->
<!-- End of IF-->


<!-- Button Approval-->
@if ((\Auth::user()->position === 'Team Leader' && $ss->status == 0) || ((\Auth::user()->position === 'Head of Business Unit' || \Auth::user()->position === 'Head of HR') && $ss->status == 1)) 
<div id="page-wrapper">
	<div class="row">
		<div class="panel panel-default" style="margin-left:30px;max-width:50%">
			<div class="panel-body">
				<a href="{{url('/approval/'.$ss->kodeSS)}}" class="btn btn-update" onclick="return confirm('Are you sure?')">Approve</a>
				<a href="{{url('/rejection/'.$ss->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Reject</a>
			</div>
		</div>
	</div>
</div>
@endif

@endsection