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
			@if (\Auth::user()->position != 'Member')
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
							@foreach($all as $f)
							<tr>
							  <th scope="row">{{$f->kodeSS}}</th>
							  <td>{{$f->tipe}}</td>
							  <td>{{$f->request_date}}</td>
							  <td><a href="{{url('/getDetail/'.$f->kodeSS)}}" class="btn btn-view">View</a></td>
							  	@if (\Auth::user()->position === 'Team Leader')
							  		<td>@if ($f->status == 1)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
									<td>@if ($f->status == 1)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
								@elseif (\Auth::user()->posisition === 'Head of Business Unit' || \Auth::user()->position === 'Head of HR')
								  	<td>@if ($f->status == 2)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
									<td>@if ($f->status == 2)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
								@else 
									<td>@if ($f->status == 0)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
									<td>@if ($f->status == 0)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
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
			@else
				<div class="table-responsive">
					<h4>Your Request</h4>
						<table class="table" id="dataTable">
						  <thead>
							<tr>
							  <th>ID</th>
							  @if (\Auth::user()->position != 'Head of HR')
							  	<th>Type</th>
							  @endif
							  <th>Date Requested</th>
							  <th>View Details</th>
							  <th>Update</th>
							  <th>Delete</th>
							</tr>
						  </thead>
						  <tbody>
							@foreach($all as $g)
							<tr>
							  <th scope="row">{{$g->kodeSS}}</th>
							  @if (\Auth::user()->position != 'Head of HR')
							  	<td>{{$g->tipe}}</td>
							  @endif
							  <td>{{$g->request_date}}</td>
							  <td><a href="{{url('/getDetail/'.$g->kodeSS)}}" class="btn btn-view">View</a></td>
							  	@if (\Auth::user()->position === 'Team Leader')
							  		<td>@if ($g->status == 1)<a href="{{url('/update/'.$g->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
									<td>@if ($g->status == 1)<a href="{{url('/delete/'.$g->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
								@elseif (\Auth::user()->posisition === 'Head of Business Unit' || \Auth::user()->position === 'Head of HR')
								  	<td>@if ($g->status == 2)<a href="{{url('/update/'.$g->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
									<td>@if ($g->status == 2)<a href="{{url('/delete/'.$g->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
								@else 
									<td>@if ($g->status == 0)<a href="{{url('/update/'.$g->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
									<td>@if ($g->status == 0)<a href="{{url('/delete/'.$g->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
								@endif
							</tr>
							@endforeach
						  </tbody>
						</table><br/>
				</div>
			@endif
		</section>
@endsection