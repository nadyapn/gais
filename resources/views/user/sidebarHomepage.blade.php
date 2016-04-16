@extends('layouts.master')


@section('content')
        <!-- Sidebar -->
        <div class="nav-side-menu">
			<div class="brand"><a href="{{url('/homepageGAIS')}}">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> 
						  <a href="{{url('/sidebarNonAdmin')}}">Dashboard <b> {{\Auth::user()->position}} </b> </a>
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
		
		@yield('contentAdd')
@endsection
