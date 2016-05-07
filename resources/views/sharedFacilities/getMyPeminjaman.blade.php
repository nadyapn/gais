@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<section id="content">
			<div class="breadcrumb">
						<ul class="isiBreadcrumb">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="#">Homepage</a></li>
									<li><a href="#" class="active">Shared Facilities Scheduler History</a></li>
								</ul>
							<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move">Your Actual Shared Facilities Request <b> Status </b></p>
			</div>

			<div class="color3">
				<!-- Status request Shared Facilities -->
				<p id="move2">Your Request: <!-- Nama Ruangan - Jam - Status -->  <a style="color:#f1c40f "> <b> Room 2 at 8.00 - 9.00am </b> </a> <b> has entered to waiting list </b> </p>
			</div>

			<div id="color4">
				<p id="move">Shared Facilities Request History</p>
			</div>

			<br>
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
								<th>Request ID</th>
							  <th>Requested Date</th>
							  <th>Time</th>
							  <th>Description</th>
								<th>Delete</th>
							</tr>
					  	</thead>
					  	<tbody>
								<!-- insert kode here -->
							</tbody>
					</table>
			</div>
		</section>
@endsection
