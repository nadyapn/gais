@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
		<section id="content">
			<div class="container">
				<div class="titleContent">
				  <h2>Reimburse History</h2>
				  <h4>List of your Reimburse  History</h4>
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
				<table class="table">
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
						  	@foreach($rm as $e)
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
								@if ($e->status == 0)
									<td><a href="{{url('/update/'.$e->kodeSS)}}" class="btn btn-view">Update</td>
									<td><a href="{{url('/delete/'.$e->kodeSS)}}" class="btn btn-view">Delete</td>
								@endif
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
@endsection