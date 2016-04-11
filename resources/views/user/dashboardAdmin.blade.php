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
						  <a href="#">
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> Dashboard <b> Admin </b>
						  </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/log.png"> View My Log <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							<li data-toggle="collapse" data-target="#Employee-Self-Service2"><a href="#">Employee Self-Service
								<ul class="sub-menu collapse" id="Employee-Self-Service2">
									<li><a href="{{url('/getLogReimbursement')}}">Reimburse</a></li>		
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
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>Type</th>
						  <th>Request Date</th>
						  <th>Employee Name</th>
						  <th>Project Info</th>
						  <th>Necessity</th>
						  <th>Status</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">1</th>
						  <td>Reimburse</td>
						  <td>24/5/2010</td>
						  <td>John Doe</td>
						   <td>Project A</td>
						  <td>Travelling</td>
						  <td><button class="btn btn-delete">Canceled</button></td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>Reimburse</td>
						  <td>24/5/2010</td>
						  <td>Dian Sas</td>
						  <td>Project A</td>
						  <td>Copying Document B</td>
						  <td><button class="btn btn-view">Completed</button></td>
						</tr>
						<tr>
						  <th scope="row">3</th>
						  <td>Reimburse</td>
						  <td>24/5/2010</td>
						  <td>Pevita</td>
						  <td>Project A</td>
						  <td>Shopping</td>
						  <td><button class="btn btn-view">Completed</button></td>
						</tr>
						<tr>
						  <th scope="row">4</th>
						  <td>Reimburse</td>
						  <td>14/6/2010</td>
						  <td>Mark Webb</td>
						  <td>Project A</td>
						  <td>Shopping</td>
						  <td><button class="btn btn-update">Not Completed</button></td>
						</tr>
						<tr>
						  <th scope="row">5</th>
						  <td>Reimburse</td>
						  <td>14/6/2014</td>
						  <td>Jessica</td>
						  <td>Project B</td>
						  <td>Administration Cost</td>
						  <td><button class="btn btn-update">Not Completed</button></td>
						</tr>
					  </tbody>
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