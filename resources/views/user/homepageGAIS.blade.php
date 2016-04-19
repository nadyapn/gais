@extends('user.sidebarHomepage')

@section('contentAdd')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
				</ul>
			</div>
	<div id="color">
		<p id="move">Homepage, <b>{{\Auth::user()->name}}</b></p>
		<p id="move2">Place for Request Something</p>
	</div>
		<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-82">
				  
				  <br>
				  	<div class="containerDashboard">
						<div class="col-homepage-left">
								<div class="createReimburse">
									<img src="{{asset('img/selfservice2.png')}}" style=" width:60% vertical-align:middle"><br><br>
									<div class="well2">
									<button class="buttonHomepage"><p>Employee Self Service</p></button>
									</div>
								</div>
						</div>
						<div class="col-homepage-center">
									<div class="createReimburse">
										<img src="{{asset('img/scheduler2.png')}}" style=" width:60% vertical-align:middle"><br><br>
										<div class="well2">
										<button class="buttonHomepage2"><p>Shared Facilities Scheduler</p></button>
									</div>
							</div>
						</div>
						<div class="col-homepage-right">
								<div class="createReimburse">
									<img src="{{asset('img/observice2.png')}}" style=" width:60% vertical-align:middle"><br><br>
									<div class="well2">
									<button class="buttonHomepage3"><p>Office Boy Service</p></button>
									</div>
							</div>
						</div>
					</div>
					
					<div id="conDashboard2" class="containerDashboard2">
						@if (\Auth::user()->position != 'Business Unit')
						<div class="col-homepage-left">
							<div class="well">
								<li> <div class="createReimburse">
									<a href=""><img src="{{asset('img/selfservice2.png')}}" style=" width:60% vertical-align:middle"> </a>
									<h4>Reimburse</h4>
								</div> </li>
							</div>
						</div>
						@endif
						@if (\Auth::user()->position != 'Human Resource')
						<div class="col-homepage-center">
							<div class="well">
								<div class="createPaidLeave">
									<a href=""><img src="{{asset('img/scheduler2.png')}}" style=" width:60% vertical-align:middle"> 
									<h4>Paid Leave</h4>
								</div>
							</div>
						</div>
						@endif
						@if (\Auth::user()->position != 'Business Unit')
						<div class="col-homepage-right">
							<div class="well">
								<div class="createOvertime">
									<img src="{{asset('img/observice2.png')}}" style=" width:60% vertical-align:middle"> 
									<h4>Overtime</h4>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			  </div>
			</div>
	</section>
@endsection