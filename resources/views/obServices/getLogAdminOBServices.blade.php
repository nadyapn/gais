@extends('user.sidebarAdmin')

@section('contentAdmin')
	<section id="content">
			<div class="breadcrumb">
						<ul class="isiBreadcrumb">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="#">Homepage</a></li>
									<li><a href="#" class="active"> Office Boy Services Log</a></li>
								</ul>
							<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move">Office Boy Services</p>
				<p id="move2">Log Data</p>
			</div>
			<br>
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
							  <th>Requested ID</th>
							  <th>Requested Date</th>
								<!-- Sort  by the newest date-->
							  <th>Applicant's Name</th>
							  <th>Time</th>
								<!-- Contoh: 08.00 - 09.00-->
							  <th>Room</th>
							  <th>Description</th>
							</tr>
					  	</thead>
					  	<tbody>
								<!-- insert kode here -->
							</tbody>
					</table>
			</div>
		</section>
@endsection
