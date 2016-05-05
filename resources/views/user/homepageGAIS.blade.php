@extends('user.sidebarHomepage')

@section('contentAdd')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<a  class="btnDashboard"> </a>
						<ul class="isiBreadcrumb2">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#" class="active"></a></li>
						</ul>
				</ul>
			</div>
	<div id="color">
		<p id="move">Welcome to Homepage <b>{{\Auth::user()->name}}</b>!</p>
		<p id="move2">Place for Request Something</p>
	</div>
			<div class="container">
			  <div class="row">
				<div class="col-md-8">

				  <br>
				  	<div class="containerDashboard">
						<div class="col-homepage-left">
								<div class="createDashboard">
									<img src="{{asset('img/selfserviceblack.png')}}" style=" width:60% vertical-align:middle"><br><br>
									<a class="buttonHomepage btn btn-secondary2">Employee Self Service</a>
								</div>
						</div>
						<div class="col-homepage-center">
								<div class="createDashboard">
									<img src="{{asset('img/schedulerblack.png')}}" style=" width:60% vertical-align:middle"><br><br>
									<a href="{{url('/addSharedFacilities')}}" class="btn btn-secondary2">Shared Facilities Scheduler </a>
								</div>
						</div>
						<div class="col-homepage-right">
								<div class="createDashboard">
									<img src="{{asset('img/observiceblack.png')}}" style=" width:60% vertical-align:middle"><br><br>
									<a href="{{url('/addOBServices')}}" class="btn btn-secondary2">Office Boy Service</a>
								</div>
						</div>
					</div>
					<br>
					<div id="conDashboard2" class="containerDashboard2">
						@if (\Auth::user()->position != 'Business Unit')
						<div class="col-homepage-left">
									<div class="createDashboard">
										<img src="{{asset('img/reimburse.png')}}" style=" width:60% vertical-align:middle"><br><br>
										<a href="{{url('/createReimbursement')}}" class="btn btn-secondary2">Reimbursement</a>
									</div>
						</div>
						@endif
						@if (\Auth::user()->position != 'Human Resource')
						<div class="col-homepage-center">
									<div class="createDashboard">
										<img src="{{asset('img/paidleave.png')}}" style=" width:60% vertical-align:middle"><br><br>
										<a href="{{url('/createPaidLeave')}}" class="btn btn-secondary2">Paid Leave</a>
									</div>
						</div>
						@endif
						@if (\Auth::user()->position != 'Business Unit')
						<div class="col-homepage-right">
									<div class="createDashboard">
										<img src="{{asset('img/overtime.png')}}" style=" width:60% vertical-align:middle"><br><br>
										<a href="{{url('/createOvertime')}}" class="btn btn-secondary2">Overtime</a>
									</div>
						</div>
						@endif
					</div>
				</div>
			  </div>
			</div>
	</section>
@endsection
