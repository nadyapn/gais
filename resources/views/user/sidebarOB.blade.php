@extends('layouts.master')

@section('content')
       <!-- Sidebar -->
        <div id="sidebarNonAdmin" class="nav-side-menu">
			<div class="brand"><a class="aBrand" href="{{url('/homepageGAIS')}}">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
						  <a href="{{url('/dashboardNonAdmin')}}">
						  <img style="margin-left:10px;margin-right:5px"src="{{asset('img/dashboard-white.png')}}"> Dashboard <b> {{\Auth::user()->position}} </b>
						  </a>
						</li>

            <li>
						  <a href="{{url('/getTaskOBServices')}}">
						  <img style="margin-left:10px;margin-right:5px"src="{{asset('img/taskob.png')}}"> My Task </b>
						  </a>
						</li>
            <li>
						  <a href="{{url('/getLogOBServices')}}">
						  <img style="margin-left:10px;margin-right:5px"src="{{asset('img/logob.png')}}"> My Log </b>
						  </a>
						</li>
			 </div>
		</div>
        <!-- /#sidebar-wrapper -->

        @yield('contentOB')

@endsection
