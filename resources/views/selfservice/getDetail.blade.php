@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#">Reimbursement History</a></li>
							<li><a href="#" class="active">Detail Request</a></li>
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
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
						KodeSS : {{$ss->kodeSS}}<br/>
						Business Purpose : {{$rm->business_purpose}}<br/>
						Category : {{$rm->category}}<br/>
						Event Date : {{$rm->date}}<br/>
						Detail of Spending : {{$ss->description}}<br/>
						Total Cost : {{$rm->cost}}<br/>
						Photo : <img src="{{url('./foto/'.$rm->photo)}}" style="width:500px;"/><br/>
						
						@if ($rm->status == 0)
							Not approved yet by Supervisor
						@elseif ($rm->status == 1)
							Approved by Supervisor 
						@elseif ($rm->status == 2)
							Approved by Business Unit
						@elseif ($rm->status == -1)
							Canceled by Employee
						@endif<br/>

						Request Date : {{$ss->request_date}}<br/>

						<br/>
					@elseif ($pl != "")
						KodeSS : {{$ss->kodeSS}}<br/>
						Date Hired : {{$pl->date_hired}}<br/>
						Period of Leave : {{$pl->period_of_leave}}<br/>
						Total Leave : {{$pl->total_leave}}<br/>
						Reason of Leave : {{$ss->description}}<br/>
						Category : {{$pl->category}}<br/>

						@if ($pl->status == 0)
							Not approved yet by Supervisor
						@elseif ($pl->status == 1)
							Approved by Supervisor 
						@elseif ($pl->status == 2)
							Approved by HR
						@elseif ($pl->status == -1)
							Canceled by Employee
						@endif<br/>

						Request Date : {{$ss->request_date}}<br/>
					@elseif ($ot != "")
						KodeSS : {{$ss->kodeSS}}<br/>
						Date of Overtime : {{$ot->date}}<br/>
						Time Starts : {{$ot->time_start}}<br/>
						Time Ends : {{$ot->time_end}}<br/>
						Reason of Overtime : {{$ss->description}}<br/>

						@if ($ot->status == 0)
							Not approved yet by Supervisor
						@elseif ($ot->status == 1)
							Approved by Supervisor 
						@elseif ($ot->status == 2)
							Approved by Business Unit
						@elseif ($ot->status == -1)
							Canceled by Employee
						@endif<br/>

						Request Date : {{$ss->request_date}}<br/>
					@else
						not found
					@endif
				  <br/>

				  <a href="{{url('/aprove')}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Approve</a>
				  <a href="{{url('/rejection')}}" class="btn btn-view" onclick="return confirm('Are you sure?')">Reject</a>
					
				  <!-- Button trigger modal -->
				</div>
			  </div>
			</div>
	</section>

	@endsection


