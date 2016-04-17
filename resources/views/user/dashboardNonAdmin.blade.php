@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
	<div class="breadcrumb">
		<ul class="isiBreadcrumb">
			<input type="image" class="btnDashboard" src="img/symbol.png">
				<ul class="isiBreadcrumb2">
				<li><a href="#">Homepage</a></li>
				<li><a href="#" class="active">Dashboard Non Admin</a></li>
			</ul>
			<button type="button" class="btn btn-secondary2">Back to Home</button>
		</ul>
	</div>
	<div id="color">
		<p id="move">Dashboard</p>
		<p id="move2">Quick Overview of Your Activities</p>
	</div>
		<section id="content">
			<div class="container">
				<div class="titleContent">
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
				<h4>Your Request</h4>
					<table class="table" id="dataTable">
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>Type</th>
						  <th>Date Requested</th>
						  <th>View Details</th>
						  <th>Update</th>
						  <th>Delete</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($all as $e)
						<tr>
						  <th scope="row">{{$e->kodeSS}}</th>
						  <td>{{$e->tipe}}</td>
						  <td>{{$e->request_date}}</td>
						  <td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</a></td>
						  	@if (\Auth::user()->position === 'Supervisor')
						  		@if ($e->status == 1)
								  <td><button class="btn btn-update">Update</button></td>
								  <td><button class="btn btn-delete">Delete</button></td>
								@endif
							@elseif (\Auth::user()->posisition === 'Business Unit' || \Auth::user()->position === 'Human Resource')
							  	@if ($e->status == 2)
								  <td><button class="btn btn-update">Update</button></td>
								  <td><button class="btn btn-delete">Delete</button></td>
								@endif
							@else 
								@if ($e->status == 0)
								  <td><button class="btn btn-update">Update</button></td>
								  <td><button class="btn btn-delete">Delete</button></td>
								@endif
							@endif
						</tr>
						@endforeach
					  </tbody>
					</table>
			</div>
		</section>
@endsection