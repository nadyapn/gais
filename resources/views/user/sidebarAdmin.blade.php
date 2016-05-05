@extends('layouts.master')

@section('content')
        <div id="sidebarAdmin" class="nav-side-menu">
			<div class="brand"><a class="aBrand" href="{{url('/homepageGAIS')}}">GAIS</a></div>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
						  <a href="{{url('/dashboardAdmin')}}">
						  <img style="margin-left:10px;margin-right:5px"src="{{asset('img/dashboard-white.png')}}"> Dashboard <b> Admin </b>
						  </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="{{asset('img/sheet.png')}}"> View My Log <span class="arrow"></span></a>
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
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="{{asset('img/calendar-white.png')}}"> Shared Facilities <b>Special Menu</b></a>
						</li> 
					</ul>
			 </div>
		</div>    

        <!-- /#sidebar-wrapper -->
        
        @yield('contentAdmin')

@endsection