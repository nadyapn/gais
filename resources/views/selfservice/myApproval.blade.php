@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

@if(\Auth::user()->position === 'Supervisor')
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

@elseif(\Auth::user()->position === 'Business Unit')
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
			<table class="table">
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
		<div class="paginationNumber">
			<ul class="pagination">
			  <li>
				<a href="#" aria-label="Previous">
				<span aria-hidden="true">
					<i class="fa fa-caret-left"></i>
				</span>
				</a>
			  </li>
			  <li class="active"><a href="#">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			  <li>
				<a href="#" aria-label="Next">
			    <span aria-hidden="true">
					<i class="fa fa-caret-right"></i>
			    </span>
				</a>
			  </li>
			</ul>
		</div>
</section>	
@elseif(\Auth::user()->position === 'Human Resource')
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
			<table class="table">
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
		<div class="paginationNumber">
			<ul class="pagination">
			  <li>
				<a href="#" aria-label="Previous">
				<span aria-hidden="true">
					<i class="fa fa-caret-left"></i>
				</span>
				</a>
			  </li>
			  <li class="active"><a href="#">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			  <li>
				<a href="#" aria-label="Next">
			    <span aria-hidden="true">
					<i class="fa fa-caret-right"></i>
			    </span>
				</a>
			  </li>
			</ul>
		</div>
</section>
@endif
@endsection