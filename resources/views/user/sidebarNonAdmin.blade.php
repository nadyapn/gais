@extends('layouts.master')

@section('content')
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
        
        @yield('contentNonAdmin')

@endsection