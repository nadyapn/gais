@extends('user.sidebarAdmin')

@section('contentAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Admin</a></li>
							<li><a href="#" class="active">Paid Leave</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Dashboard Paid Leave Log</p>
		<p id="move2">List of Paid Leave Request</p>
	</div>
		<section id="content">
			<div class="container">
				<div class="titleContent">

				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
							  <th>Kode</th>
							  <th>Date Requested</th>
							  <th>Employee's ID</th>
							  <th>Employee's Name</th>
							  <th>Status</th>
							  <th>View Details</th>
							</tr>
					  	</thead>
					  	<tbody>
						  	@foreach($pl as $e)
						  	<tr>
								<td>{{$e->kodeSS}}</td>
								<td>{{$e->request_date}}</td>
								<td>{{$e->id_employee}}</td>
								<td>{{$e->name}}</td>
								<td>
									@if ($e->status == 0)
											Not approved yet by Supervisor
									@elseif ($e->status == 1)
											Approved by Supervisor 
									@elseif ($e->status == 2)
											Approved by HR 
									@elseif ($e->status == -1)
											Canceled by Employee
									@endif
								</td>
								<td><a href="{{url('/getDetailAdmin/'.$e->kodeSS)}}" class="btn btn-view">View</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</section>
@endsection