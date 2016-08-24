@extends('user.sidebarNonAdmin')

@section('contentAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Admin</a></li>
							<li><a href="#">OB Service History</a></li>
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
								<td>{{$obs->kodeOBS}}</td>
							</tr>
							<tr>
								<td>Employee's Name</td>
								<td>{{$em_name->name}}</td>
							</tr>
							<tr>
								<td>OB's Name</td>
								<td>{{$ob_name->name}}</td>
							</tr>
							<tr>
								<td>Requested date</td>
								<td>{{$obs->date}}</td>
							</tr>
							<tr>
								<td>Batch</td>
								<td>{{$obs->batch}}</td>
							</tr>
							<tr>
								<td>Category</td>
								<td>{{$obs->category}}</td>
							</tr>
							<tr>
								<td>Description</td>
								<td>{{$obs->detail}}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>
									@if ($obs->status == 0)
										Waiting for OB's approval
									@elseif ($obs->status == 1)
										Approved by OB
									@elseif ($obs->status == 2)
										Rejected by OB
									@elseif ($obs->status == 3)
										Request is done
									@endif
								</td>
						</table>
					</div>
				 
				</div>
			  </div>
			</div>
	</section>

	@endsection



