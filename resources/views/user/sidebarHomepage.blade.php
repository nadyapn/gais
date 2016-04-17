@extends('layouts.master')


@section('content')
        <!-- Sidebar -->
        <div id="sidebarHomepage" class="nav-side-menu">
			<div class="brand"><a class="aBrand" href="{{url('/homepageGAIS')}}">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active"> 
						  <img style="margin-left:10px;margin-right:5px"src="{{asset('img/dashboard-white.png')}}"> 
						  <a href="{{url('/dashboardNonAdmin')}}">Dashboard <b> {{\Auth::user()->position}} </b> </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src={{asset('img/selfservice-white.png')}}> Employee Self Service <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							@if (\Auth::user()->position != 'Business Unit')
							<li><a href="{{url('/createReimbursement')}}">Reimburse</a></li>
							@endif
							@if (\Auth::user()->position != 'Human Resource')		
							<li><a href="{{url('/createPaidLeave')}}">Paid Leave</a></li>
							@endif
							@if (\Auth::user()->position != 'Business Unit')
							<li><a href="{{url('/createOvertime')}}">Overtime</a></li>
							@endif
						</ul>
						
						<li class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="{{asset('img/calendar-white.png')}}"> Shared Facilities</a>
						</li>
						<li class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="{{asset('img/observice-white.png')}}"> Office Boy Service</a>
						</li> 
			 </div>
		</div>    
        <!-- /#sidebar-wrapper -->
		
		@yield('contentAdd')
@endsection
