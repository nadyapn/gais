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
				  
				  	@if ($rm != "")
						@if($rm->photo != "")  @endif
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>Kode</td>
									<td> {{$ss->kodeSS}}</td>
								</tr>
								<tr>
									<td>Employee's Name</td>
									<td> </td>
								</tr>
								<tr>
									<td>Business Purpose</td>
									<td> {{$rm->business_purpose}}</td>
								</tr>
								<tr>
									<td>Category</td>
									<td> {{$rm->category}}</td>
								</tr>
								<tr>
									<td>Date of Event</td>
									<td> {{$rm->date}}</td>
								</tr>
								<tr>
									<td>Detail of Spending</td>
									<td> {{$ss->description}}</td>
								</tr>
								<tr>
									<td>Total Cost</td>
									<td> {{$rm->cost}}</td>
								</tr>
								<tr>
									<td>Total Cost</td>
									<td> <img src="{{url('./foto/'.$rm->photo)}}" style="width:500px;"/></td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										@if ($ss->status == 0)
											Not approved yet by Supervisor
										@elseif ($ss->status == 1)
											Approved by Supervisor 
										@elseif ($ss->status == 2)
											Approved by Business Unit
										@elseif ($ss->status == -1)
											Canceled by Employee
										@elseif ($ss->status == 3)
											Rejected by Supervisor
										@elseif ($ss->status == 4)
											Rejected by Business Unit
										@endif
									</td>
								</tr>
								<tr>
									<td>Request Date</td>
									<td> {{$ss->request_date}}</td>
								</tr>
							</table>
						</div>

					@elseif ($pl != "")
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>Kode</td>
									<td> {{$ss->kodeSS}}</td>
								</tr>
								<tr>
									<td>Employee's Name</td>
									<td> </td>
								</tr>
								<tr>
									<td>Date Hired</td>
									<td> {{$pl->date_hired}}</td>
								</tr>
								<tr>
									<td>Period of Leave</td>
									<td> {{$pl->period_of_leave}}</td>
								</tr>
								<tr>
									<td>Total Leave</td>
									<td> {{$pl->total_leave}}</td>
								</tr>
								<tr>
									<td>Reason of Leave</td>
									<td> {{$ss->description}}</td>
								</tr>
								<tr>
									<td>Category</td>
									<td> {{$pl->category}}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										@if ($ss->status == 0)
											Not approved yet by Supervisor
										@elseif ($ss->status == 1)
											Approved by Supervisor 
										@elseif ($ss->status == 2)
											Approved by Business Unit
										@elseif ($ss->status == -1)
											Canceled by Employee
										@elseif ($ss->status == 3)
											Rejected by Supervisor
										@elseif ($ss->status == 4)
											Rejected by Business Unit
										@endif
									</td>
								</tr>
								<tr>
									<td>Request Date</td>
									<td> {{$ss->request_date}}</td>
								</tr>
							</table>
						</div>
					@elseif ($ot != "")
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>Kode</td>
									<td> {{$ss->kodeSS}}</td>
								</tr>
								<tr>
									<td>Employee's Name</td>
									<td> </td>
								</tr>
								<tr>
									<td>Date of Overtime</td>
									<td>{{$ot->date}}</td>
								</tr>
								<tr>
									<td>Time Starts</td>
									<td> {{$ot->time_start}}</td>
								</tr>
								<tr>
									<td>Time Ends</td>
									<td>{{$ot->time_end}}</td>
								</tr>
								<tr>
									<td>Reason of Overtime</td>
									<td> {{$ss->description}}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										@if ($ss->status == 0)
											Not approved yet by Supervisor
										@elseif ($ss->status == 1)
											Approved by Supervisor 
										@elseif ($ss->status == 2)
											Approved by Business Unit
										@elseif ($ss->status == -1)
											Canceled by Employee
										@elseif ($ss->status == 3)
											Rejected by Supervisor
										@elseif ($ss->status == 4)
											Rejected by Business Unit
										@endif
									</td>
								</tr>
								<tr>
									<td>Request Date</td>
									<td> {{$ss->request_date}}</td>
								</tr>
							</table>
						</div>
					@else
						not found
					@endif
				  <br/>

				  	@if (\Auth::user()->position === 'Supervisor' && $ss->status == 0)
					  <a href="{{url('/approval/'.$ss->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Approve</a>
					  <a href="{{url('/rejection')}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Reject</a>
					@elseif ((\Auth::user()->position === 'Business Unit' || \Auth::user()->position === 'Human Resource') && $ss->status == 1)
					  <a href="{{url('/approval/'.$ss->kodeSS)}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Approve</a>
					  <a href="{{url('/rejection')}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Reject</a>
					@endif
				  <!-- Button trigger modal -->
				</div>
			  </div>
			</div>
	</section>

	@endsection



