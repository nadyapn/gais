@extends('user.sidebarOB')

@section('contentOB')
	<section id="content">
			<div class="breadcrumb">
						<ul class="isiBreadcrumb" style="padding-left:12px">
							<input type="image" class="btnDashboard" src="img/symbol.png">
								<ul class="isiBreadcrumb2">
									<li><a href="#">Homepage</a></li>
									<li><a href="#" class="active">OB Services Task</a></li>
								</ul>
							<a href="#" class="btn btn-secondary2">Back to Home</a>
						</ul>
					</div>
			<div id="color">
				<p id="move" style="margin-left:12px">OB Services Task Data</p>
				<!-- ini contoh alert -->
				<!-- normalnya, belum muncul saat halaman baru dibuka -->
				<!-- muncul setelah nyelesain satu request -->
				<p id="move4" style="margin-left:12px">Your selected request has been successfully finished</p>
			</div>
			<div id="color2">
				<p id="move7" style="margin-left:12px">Today's date</p>
				<p class="move6" id="dateForPage"></p>
				<!-- /#table-->
				<div class="table-responsive">
						<table class="display table">
						  	<thead>
								<tr>
								  <th>Requested ID</th>
								  <th>Applicant's Name</th>
								  <th>Date Requested</th>
								  <th>Time</th>
									<!-- Contoh: 08.00 - 09.00-->
								  <th>Category</th>
									<th>Request Description</th>
									<th>Done</th>
								</tr>
						  	</thead>
						  	<tbody>
								@foreach($task as $e)
									<tr>
									<td>{{$e->kodeOBS}}</td>
									<td>{{$e->name}}</td>
									<td>{{$e->date}}</td>
									<td>{{$e->batch}}</td>
									<td>{{$e->category}}</td>
									<td>{{$e->detail}}</td>
									<td><a href="{{url('/finishOBS/'.$e->kodeOBS)}}" class="btn btn-update" onclick="return confirm('Are you sure?')">Done</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
				</div>
			</div>
			
		</section>
@endsection
