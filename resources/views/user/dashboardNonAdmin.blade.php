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
					<table class="table">
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
						@foreach($ss as $e)
						<tr>
						  <th scope="row">{{$e->kodeSS}}</th>
						  <td>{{$e->tipe}}</td>
						  <td>{{$e->request_date}}</td>
						  <td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</a></td>
						  <td><button class="btn btn-update">Update</button></td>
						  <td><button class="btn btn-delete">Delete</button></td>
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

			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
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
						@foreach($ss as $e)
						<tr>
						  <th scope="row">{{$e->kodeSS}}</th>
						  <td>{{$e->tipe}}</td>
						  <td>{{$e->request_date}}</td>
						  <td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</a></td>
						  <td><button class="btn btn-update">Update</button></td>
						  <td><button class="btn btn-delete">Delete</button></td>
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

			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
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
						@foreach($ss as $e)
						<tr>
						  <th scope="row">{{$e->kodeSS}}</th>
						  <td>{{$e->tipe}}</td>
						  <td>{{$e->request_date}}</td>
						  <td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</a></td>
						  <td><button class="btn btn-update">Update</button></td>
						  <td><button class="btn btn-delete">Delete</button></td>
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