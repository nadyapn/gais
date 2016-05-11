@extends('user.sidebarAdmin')

@section('contentAdmin')
			<div class="breadcrumb">
						<ul class="isiBreadcrumb">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="#">Homepage</a></li>
									<li><a href="#">Dashboard Admin</a></li>
									<li><a href="#" class="active">View list of facilities</a></li>
								</ul>
							<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move">Dashboard Shared Facilities</p>
				<p id="move2">List of Facilities</p>
			</div>
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
							  <th>Kode</th>
							  <th>Name</th>
							  <th>Category</th>
							  <th>Description</th>
							  <th>Delete</th>
							</tr>
					  	</thead>
					  	<tbody>
						  	@foreach($sf as $e)
						  	<tr>
								<td>{{$e->kode}}</td>
								<td>{{$e->sfname}}</td>
								<td>{{$e->category}}</td>
								<td>{{$e->description}}</td>
								<td><a href="{{url('/deleteFacility/'.$e->kode)}}" class="btn btn-view">Delete</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</section>
@endsection