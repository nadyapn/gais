	

@extends('layouts.master')


@section('content')
<html>
	<head>
		<!-- Custom CSS -->
		<link href="css/simple-sidebar.css" rel="stylesheet">
	</head>
	<body>

        <div class="nav-side-menu">
			<div class="brand"><a href="{{url('/homepageGAIS')}}">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
					
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> Dashboard <b> Admin </b>
					
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/log.png"> View My Log <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							<li data-toggle="collapse" data-target="#Employee-Self-Service2"><a href="#">Employee Self-Service
								<ul class="sub-menu collapse" id="Employee-Self-Service2">
									<li><a href="{{url('/getLogReimburse')}}">Reimburse</a></li>		
									<li><a href="{{url('/getLogPaidLeave')}}">Paid Leave</a></li>
									<li><a href="{{url('/getLogOvertime')}}">Overtime</a></li>
								</ul>
							</li>
							<li><a href="#">Shared Facilities Scheduler</li>
							<li><a href="#">Office Boy Service<i> Beta</i></li>
						</ul>
						
						<li data-toggle="collapse" data-target="#service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/scheduler.png"> Shared Facilities <b>Special Menu</b></a>
						</li> 
			 </div>
		</div>    

        <!-- /#sidebar-wrapper -->
		
		<section id="content">
			<div class="container">
				<div class="titleContent">
				  <h2>Reimburse Data Log</h2>
				  <h4>List of Reimburse Request</h4>
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
					  	@foreach($rm as $e)
							Kode : {{$e->kodeSS}}<br/>
							Employee ID: {{$e->employee_id}}<br/>
							Name : {{$e->name}}<br/>
							
							@if ($e->status == 0)
									Status : Not approved yet by Supervisor <br/>
							@elseif ($e->status == 1)
									Status : Approved by Supervisor <br/>
							@elseif ($e->status == 2)
									Status : Approved by HR <br/>
							@elseif ($e->status == 3)
									Status : Approved by Business Unit <br/>
							@endif
					 
						@endforeach
					</table>
			</div>
			<div class="paginationNumber">
					<ul class="pagination">
					  <li>
						<a href="#" aria-label="Previous">
						  <span aria-hidden="true">
							<i class="fa fa-caret-left"></i>
						  </span>
						</a>
					  </li>
					  <li class="active"><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li>
						<a href="#" aria-label="Next">
						  <span aria-hidden="true">
							<i class="fa fa-caret-right"></i>
						  </span>
						</a>
					  </li>
					</ul>
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