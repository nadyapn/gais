@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Office Boy Services History</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Your Request <!--Insert code here --> </h2>
					</div>
					<div class="page-header2">
							<h2>OB Services Request History</h2>
							<h4>A detailed look of your OB Services history</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
	<!-- Table for My History -->
	<div style="margin-top:15px; margin-left:30px" class="table-responsive">
		<table class="display table">
			<thead>
				<tr>
					<th>Requested ID</th>
					<th>Requested Date</th>
					<th>Time</th>
					<th>Category</th>
					<th>Description</th>
					<th>Status</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
						@foreach($obs as $o)
								<tr>
									<td>{{$o->kodeOBS}}</td>
									<td>{{$o->date}}</td>
                	<td>{{$o->batch}}</td>
									<td>{{$o->category}}</td>
									<td>{{$o->detail}}</td>
									<td>
										@if ($o->status == 0)
										Waiting for OB's approval
										@elseif ($o->status == 1)
											Approved by OB
										@elseif ($o->status == 2)
											Rejected by OB
										@elseif ($o->status == 3)
											Request is done
										@endif
									</td>
									<td><a href="{{url('/updateOBS/'.$o->kodeOBS)}}" class="btn btn-update">Update</a></td>
									<td><a href="{{url('/deleteOBS/'.$o->kodeOBS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a></td>
								</tr>
						@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>
@endsection
