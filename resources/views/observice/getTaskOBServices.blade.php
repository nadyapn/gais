@extends('user.sidebarOB')

@section('contentOB')
	<section id="content">
			<div class="breadcrumb">
						<ul class="isiBreadcrumb">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
									<li><a href="#" class="active">OB Services Task</a></li>
								</ul>
							<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move">OB Services Task Data</p>
				<!-- ini contoh alert -->
				<!-- normalnya, belum muncul saat halaman baru dibuka -->
				<!-- muncul setelah nyelesain satu request -->
				<p id="move4">Your selected request has been successfully finished</p>
			</div>
			<div id="color2">
				<p id="move7">Today's date</p>
				<p class="move6" id="dateForPage"></p>
			</div>
			<br>
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  	<thead>
							<tr>
							  <th>Requested ID</th>
							  <th>Applicant's Name</th>
							  <th>Time</th>
								<!-- Contoh: 08.00 - 09.00-->
							  <th>Category</th>
								<th>Request Description</th>
								<th>Location</th>
								<th>Done</th>
								<th>Undone</th>
							</tr>
					  	</thead>
					  	<tbody>
								<!-- insert kode here -->
							</tbody>
					</table>
			</div>
		</section>
@endsection
