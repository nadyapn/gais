@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

@if(\Auth::user()->position === 'Team Leader')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#" class="active">My Approval</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">My Approval</p>
		<p id="move2">List of Self-service Request</p>
	</div>		
		<!-- /#table-->
		<div class="table-responsive">
			<table class="table" id="dataTable">
				<thead>
					<tr>
					  <th>Kode</th>
					  <th>Date Requested</th>
					  <th>Type</th>
					  <th>Employee's Name</th>
					  <th>Status</th>
					  <th>View Details</th>
					</tr>
				</thead>
			  	<tbody>
				  	@foreach($ss as $e)
				  	<tr>
						<td>{{$e->kodeSS}}</td>
						<td>{{$e->request_date}}</td>
						<td>{{$e->tipe}}</td>
						<td>{{$e->name}}</td>
						<td>
							@if ($e->status == 0)
								Not approved yet by Supervisor
							@elseif ($e->status == 1)
								Approved by Supervisor  
							@elseif ($e->status == 2)
								Approved by Business Unit
							@elseif ($e->status == -1)
								Canceled by Employee
							@endif
						</td>
						<td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</td>
					</tr>
					@endforeach
				</tbody>
			</table>		
		</div>
</section>

@elseif(\Auth::user()->position === 'Head of Business Unit')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#" class="active">My Approval</a></li>
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
				</ul>
			</div>
	<div id="color">
		<p id="move">My Approval</p>
		<p id="move2">List of Reimbursement & Overtime Request</p>
	</div>			
		<!-- /#table-->
		<div class="table-responsive">
			<table class="table" id="dataTable">
				<thead>
					<tr>
					  <th>Kode</th>
					  <th>Date Requested</th>
					  <th>Type</th>
					  <th>Employee's Name</th>
					  <th>Status</th>
					  <th>View Details</th>
					</tr>
				</thead>
			  	<tbody>
				  	@foreach($ss as $e)
				  		@if($e->tipe != 'PaidLeave')
					  	<tr>
							<td>{{$e->kodeSS}}</td>
							<td>{{$e->request_date}}</td>
							<td>{{$e->tipe}}</td>
							<td>{{$e->name}}</td>
							<td>
								@if ($e->status = 0)
									Not approved yet by Supervisor
								@elseif ($e->status = 1)
									Approved by Supervisor  
								@elseif ($e->status = 2)
									Approved by Business Unit
								@elseif ($e->status = -1)
									Canceled by Employee
								@endif
							</td>
							<td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</td>
						</tr>
						@endif
					@endforeach
				</tbody>
			</table>		
		</div>
</section>	
@elseif(\Auth::user()->position === 'Head of HR')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#" class="active">My Approval</a></li>
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
				</ul>
			</div>
	<div id="color">
		<p id="move">My Approval</p>
		<p id="move2">List of Paid Leave Request</p>
	</div>				
		<!-- /#table-->
		<div class="table-responsive">
			<table class="table" id="dataTable">
				<thead>
					<tr>
					  <th>Kode</th>
					  <th>Date Requested</th>
					  <th>Employee's Name</th>
					  <th>Status</th>
					  <th>View Details</th>
					</tr>
				</thead>
			  	<tbody>
				  	@foreach($ss as $e)
				  	<tr>
						<td>{{$e->kodeSS}}</td>
						<td>{{$e->request_date}}</td>
						<td>{{$e->name}}</td>
						<td>
							@if ($e->status = 0)
								Not approved yet by Supervisor
							@elseif ($e->status = 1)
								Approved by Supervisor  
							@elseif ($e->status = 2)
								Approved by Business Unit
							@elseif ($e->status = -1)
								Canceled by Employee
							@endif
						</td>
						<td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</td>
					</tr>
					@endforeach
				</tbody>
			</table>		
		</div>
</section>
@endif
@endsection