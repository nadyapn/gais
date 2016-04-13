@extends('user.sidebarNonAdmin')


@section('contentNonAdmin')
		<section id="content">
			<div class="breadcrumb">
				<ul class="ulBreadcrumb">
				  <li><a href="#">Projects</a></li>
				  <li><a href="#">Breadcrumb</a></li>
				  <li><a href="#" class="active">Download</a></li>
				</ul>
				<button type="button" class="btn btn-secondary2">Back to Homepage</button>
			</div>
			<div class="container">
				<div class="titleContent">
				  <h2>Employee Self Service History</h2>
				  <h4>List of your Employee Self Service History</h4>
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
		</section>
@endsection