@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#">Reimbursement History</a></li>
							<li><a href="#" class="active">Detail Request
							</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
		<div id="color">
			<p id="move">Detail of Request</p>
			<p id="move2">Rincian Pengajuan</p>
		</div>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  
				  	<div class="table-responsive">
						<table class="table">
							<tr>
								<td>Request ID</td>
								<td>{{$peminjaman->kodePinjam}}</td>
							</tr>
							<tr>
								<td>Employee's Name</td>
								<td>{{$peminjaman->name}}</td>
							</tr>
							<tr>
								<td>Facility's Name</td>
								<td>{{$peminjaman->sfname}}</td>
							</tr>
							<tr>
								<td>Start Time</td>
								<td>{{$peminjaman->time_start}}</td>
							</tr>
							<tr>
								<td>End Time</td>
								<td>{{$peminjaman->time_end}}</td>
							</tr>
							<tr>
								<td>Description</td>
								<td>{{$peminjaman->description}}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>
									@if($peminjaman->status == 0) 	
							  			Booked
							  		@elseif($peminjaman->status == 1)
							  			Waiting List
							  		@elseif($peminjaman->status == -1)
							  			Canceled
							  		@endif
								</td>
							<tr>
								<td>Requested Date</td>
								<td>{{$peminjaman->request_date}}</td>
							</tr>
						</table>
					</div>
				 
				</div>
			  </div>
			</div>
	</section>

	@endsection



