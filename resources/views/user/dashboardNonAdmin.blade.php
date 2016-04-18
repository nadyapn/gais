@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
	<div class="breadcrumb">
		<ul class="isiBreadcrumb">
			<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
				<ul class="isiBreadcrumb2">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
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
						  		<td>@if ($e->status == 1)<a href="{{url('/update/'.$e->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
								<td>@if ($e->status == 1)<a href="{{url('/delete/'.$e->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
							@elseif (\Auth::user()->posisition === 'Business Unit' || \Auth::user()->position === 'Human Resource')
							  	<td>@if ($e->status == 2)<a href="{{url('/update/'.$e->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
								<td>@if ($e->status == 2)<a href="{{url('/delete/'.$e->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
							@else 
								<td>@if ($e->status == 0)<a href="{{url('/update/'.$e->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
								<td>@if ($e->status == 0)<a href="{{url('/delete/'.$e->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
							@endif
						</tr>
						@endforeach
					  </tbody>
					</table><br/>
			</div>
			<div class="table-responsive">
				<h4>Employees' Request</h4>
					<table class="table" id="dataTable">
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>Type</th>
						  <th>Date Requested</th>
						  <th>View Details</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($ss as $e)
						<tr>
						  <th scope="row">{{$e->kodeSS}}</th>
						  <td>{{$e->tipe}}</td>
						  <td>{{$e->request_date}}</td>
						  <td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</a></td>
						</tr>
						@endforeach
					  </tbody>
					</table>
			</div>
		</section>
@endsection