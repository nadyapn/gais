

@extends('layouts.master')

@section('content')

<html>
	<head>
		<!-- Custom CSS -->
		<link href="css/simple-sidebar.css" rel="stylesheet">
	</head>
	<body>

        <!-- Sidebar -->
        <div class="nav-side-menu">
			<div class="brand"><a href="{{url('/homepageGAIS')}}">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
						  <a href="#">
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> Dashboard <b> Supervisor </b>
						  </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/approval.png"> My Approval <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							<li><a href="#">Employee Self Service</li>
						</ul>
						<li  data-toggle="collapse" data-target="#myHistory" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/history.png"> My History<span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="myHistory">
							<li data-toggle="collapse" data-target="#Employee-Self-Service2"><a href="#">Employee Self-Service
								<ul class="sub-menu collapse" id="Employee-Self-Service2">
									<li><a href="{{url('/createReimburse')}}">Reimburse</a></li>		
									<li><a href="{{url('/createPaidLeave')}}">Paid Leave</a></li>
									<li><a href="{{url('/createOvertime')}}">Overtime</a></li>
								</ul>
							</li>
							<li><a href="#">Shared Facilities Scheduler</li>
							<li><a href="#">Office Boy Service<i> Beta</i></li>
						</ul>
			 </div>
		</div>    
        <!-- /#sidebar-wrapper -->
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Details</h2>
				  <h4>View Your Details</h4>
				  <br>
				  	@if ($rm != "")
						@if($rm->photo != "")  @endif
						KodeSS : {{$ss->kodeSS}}<br/>
						Business Purpose : {{$rm->business_purpose}}<br/>
						Category : {{$rm->category}}<br/>
						Event Date : {{$rm->date}}<br/>
						Detail of Spending : {{$ss->description}}<br/>
						Total Cost : {{$rm->cost}}<br/>
						Photo : <img src="{{url('./foto/'.$rm->photo)}}" style="width:500px;"/><br/>
						
						@if($rm->status == 0) 
							Status : Not approved yet by Supervisor 
						@else	
							Status : Approved by Supervisor
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

						@if($pl->status == 0) 
							Status : Not approved yet by Supervisor 
						@else	
							Status : Approved by Supervisor
						@endif

						Request Date : {{$ss->request_date}}<br/>
					@elseif ($ot != "")
						KodeSS : {{$ss->kodeSS}}<br/>
						Date of Overtime : {{$ot->date}}<br/>
						Time Starts : {{$ot->time_start}}<br/>
						Time Ends : {{$ot->time_end}}<br/>
						Reason of Overtime : {{$ss->description}}<br/>

						@if($ot->status == 0) 
							Status : Not approved yet by Supervisor 
						@else	
							Status : Approved by Supervisor
						@endif<br/>

						Request Date : {{$ss->request_date}}<br/>
					@else
						not found
					@endif
				  <br/>
				</div>
			  </div>
			</div>
	</section>
	
	    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	</body>
</html>

@endsection


