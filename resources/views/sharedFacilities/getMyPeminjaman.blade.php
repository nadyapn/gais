@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<section id="content">
			<div class="breadcrumb">
						<ul class="isiBreadcrumb">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="#">Homepage</a></li>
									<li><a href="#" class="active">Shared Facilities Scheduler History</a></li>
								</ul>
							<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move">Your Actual Shared Facilities Request <b> Status </b></p>
			</div>
			<div id="color4">
				<p id="move">Shared Facilities Request History</p>
			</div>

			<br>
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
								<th>Request ID</th>
								<th>Facility's Name</th>
								<th>Date Requested</th>
								<th>Status</th>
								<th>View Details</th>
								<th>Delete</th>
							</tr>
					  	</thead>
					  	<tbody>
					  		@foreach($peminjaman as $e)
					  		<tr>
								<td>{{$e->kodePinjam}}</td>
								<td>{{$e->sfname}}</td>
								<td>{{$e->request_date}}</td>
								<td>
									@if($e->status == 0) 	
							  			Booked
							  		@elseif($e->status == 1)
							  			Waiting List
							  		@elseif($e->status == -1)
							  			Canceled
							  		@endif
								</td>
								<td><a href="{{url('/getDetailPeminjaman/'.$e->kodePinjam)}}" class="btn btn-view">View</td>
								<td><a href="{{url('/delete/'.$e->kodePinjam)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</section>
@endsection
