

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
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> <a href="#">Dashboard <b> Supervisor </b>
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
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/observice.png"> Office Boy Service</a>
						</li> 
			 </div>
		</div>    
        <!-- /#sidebar-wrapper -->
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Create Paid Leave Request</h2>
				  <h4>Make your Paid Leave request</h4>
				  <br>
				  
				  <form action="{{url('/addPaidLeave')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

						<div class="form-inline">
						  <div class="form-group">
							<input type="date" class="form-control" placeholder="Enter Date Hired" name="datehired">
						  </div>
						   <div class="form-group">
								Period of Leave	: 
								<select name="periodofleave">
								  <option value="jan">January</option>
								  <option value="feb">February</option>
								  <option value="mar">March</option>
								  <option value="apr">April</option>
								  <option value="may">May</option>
								  <option value="jun">June</option>
								  <option value="jul">July</option>
								  <option value="aug">August</option>
								  <option value="sept">September</option>
								  <option value="oct">October</option>
								  <option value="nov">November</option>
								  <option value="dec">December</option>
								</select> 
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Your Reason" name="rsnofleave">
						  </div>
						  <div class="form-group">
							Category	: 
								<select name="category">
								  <option value="sick">Sick</option>
								  <option value="maternity">Maternity</option>
								  <option value="other">Other</option>
								</select> 
						  </div>
						  
						</div>
						<input type="submit" value="Submit"/>
					</form>

				  <form>
					
				  </form>
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
