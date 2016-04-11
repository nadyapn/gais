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
						  <a href="{{url('/dashboardNonAdmin')}}">  <!--- DASHBOARD TERGANTUNG !-->
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> Dashboard
						  </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/selfservice.png"> Employee Self Service <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							<li><a href="{{url('/createReimbursement')}}">Reimburse</a></li>		
							<li><a href="{{url('/createPaidLeave')}}">Paid Leave</a></li>
							<li><a href="{{url('/createOvertime')}}">Overtime</a></li>
						</ul>
						
						<li class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/scheduler.png"> Shared Facilities</a>
						</li>
						<li class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/observice.png"> Office Boy Service <i>beta</i></a>
						</li> 
			 </div>
		</div>    

        <!-- /#sidebar-wrapper -->
		<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-82">
				  <h2>Homepage</h2>
				  <h4>The Right Place to Request Something</h4>
				  <br>
				  <div class="containerDashboard">
						<div onclick="showDiv()" class="col-homepage-left">
							<div class="well">
								<li onclick="showDiv()" class="liSelfService"> <div class="createReimburse">
									<img class="imgESS" onclick="showDiv()" src="img/selfservice2.png" style=" width:60% vertical-align:middle">
									<h4>Employee Self Service</h4>
								</div> </li>
							</div>
						</div>
						<div class="col-homepage-center">
							<div class="well">
								<div class="createPaidLeave">
									<a href=""><img src="img/scheduler2.png" style=" width:60% vertical-align:middle"> 
									<h4>Shared Facilities Scheduler</h4>
								</div>
							</div>
						</div>
						<div class="col-homepage-right">
							<div class="well">
								<div class="createOvertime">
									<img src="img/observice2.png" style=" width:60% vertical-align:middle"> 
									<h4>Office Boy Service</h4>
								</div>
							</div>
						</div>
					</div>
					<div id="conDashboard2" class="containerDashboard2">
						<div class="col-homepage-left">
							<div class="well">
								<li> <div class="createReimburse">
									<a href=""><img src="img/selfservice2.png" style=" width:60% vertical-align:middle"> </a>
									<h4>Reimburse</h4>
								</div> </li>
							</div>
						</div>
						<div class="col-homepage-center">
							<div class="well">
								<div class="createPaidLeave">
									<a href=""><img src="img/scheduler2.png" style=" width:60% vertical-align:middle"> 
									<h4>Paid Leave</h4>
								</div>
							</div>
						</div>
						<div class="col-homepage-right">
							<div class="well">
								<div class="createOvertime">
									<img src="img/observice2.png" style=" width:60% vertical-align:middle"> 
									<h4>Overtime</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
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

	<script>
		function showDiv() {
		   document.getElementById('#conDashboard2').style.display = "block";
		}
	</script>

	</body>
</html>
@endsection