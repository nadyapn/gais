@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<div class="breadcrumb">
		<ul class="isiBreadcrumb">
			<input type="image" class="btnDashboard" src="img/symbol.png">
				<ul class="isiBreadcrumb2">
				<li><a href="#">Homepage</a></li>
				<li><a href="#">Dashboard Non Admin</a></li>
				<li><a href="#" class="active">Overtime History</a></li>
			</ul>
			<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
		</ul>
	</div>
	<div id="color">
		<p id="move">Dashboard Overtime</p>
		<p id="move2">A detailed look of your overtime history</p>
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
							  <th>ID</th>
							  <th>Date Requested</th>
							  <th>Status</th>
							  <th>View Details</th>
							  <th>Update</th>
							  <th>Delete</th>
							</tr>
					  	</thead>
					  	<tbody>
						  	@foreach($ot as $e)
						  	<tr>
								<td>{{$e->kodeSS}}</td>
								<td>{{$e->request_date}}</td>
								<td>
									@if ($e->status == 0)
											Not approved yet by Supervisor
									@elseif ($e->status == 1)
											Approved by Supervisor 
									@elseif ($e->status == 2)
											Approved by Business Unit
									@endif
								</td>
								<td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</td>
								<td>@if ($e->status == 0)<a href="{{url('/update/'.$e->kodeSS)}}" class="btn btn-view">Update </a> @endif</td>
								<td>@if ($e->status == 0)<a href="{{url('/delete/'.$e->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</section>
@endsection