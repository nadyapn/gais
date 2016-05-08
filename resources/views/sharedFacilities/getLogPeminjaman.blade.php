@extends('user.sidebarAdmin')

@section('contentAdmin')
	<section id="content">
			<div class="breadcrumb">
						<ul class="isiBreadcrumb">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="#">Homepage</a></li>
									<li><a href="#" class="active"> Shared Facilities Scheduler Log</a></li>
								</ul>
							<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move">Shared Facilities Scheduler</p>
				<p id="move2">Log Data</p>
			</div>
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
								<th>ID</th>
							  	<th>Employee's Name</th>
							  	<th>Facility</th>
							  	<th>Status</th>
							  	<th>View Detail</th>
							</tr>
						</thead>
						<tbody>
							@foreach($peminjaman as $e)
							<tr>
							  	<td>{{$e->kodePinjam}}</td>
							  	<td>{{$e->name}}</td>
							  	<td>{{$e->sfname}}</td>
							  	<td>
							  		@if($e->status == 0) 	
							  			Booked
							  		@elseif($e->status == 1)
							  			Waiting List
							  		@elseif($e->status == -1)
							  			Canceled
							  		@endif
							  	</td>
							  	<td><a href="{{url('/getDetailAdmin/'.$e->kodePinjam)}}" class="btn btn-view">View</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</section>
@endsection
