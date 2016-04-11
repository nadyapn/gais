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
									<li><a href="{{url('/getMyReimbursement')}}">Reimburse</a></li>		
									<li><a href="{{url('/getMyPaidLeave')}}">Paid Leave</a></li>
									<li><a href="{{url('/getMyOvertime')}}">Overtime</a></li>
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
				<div class="titleContent">
				  <h2>Employee Self Service History</h2>
				  <h4>List of your Employee Self Service History</h4>
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>Type</th>
						  <th>Date Requested</th>
						  <th>View Details</th>
						  <th>Update</th>
						  <th>Delete</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($ss as $e)
						<tr>
						  <th scope="row">{{$e->kodeSS}}</th>
						  <td>{{$e->tipe}}</td>
						  <td>{{$e->request_date}}</td>
						  <td><a href="{{url('/getDetail/'.$e->kodeSS)}}" class="btn btn-view">View</a></td>
						  <td><button class="btn btn-update">Update</button></td>
						  <td><button class="btn btn-delete">Delete</button></td>
						</tr>
						@endforeach
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