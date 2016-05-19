@extends('layouts.master')


@section('contentSidebar')
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						            <li class="gaisBrandDashboard">
                            <a style="font-size:2em; text-align:center" href="{{url('/homepageGAIS')}}"><i></i> GAIS</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboardNonAdmin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard <b> {{\Auth::user()->position}} </b></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Employee Self-Service<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
								<li><a href="{{url('/createReimbursement')}}">Reimburse</a></li>
								
								<li><a href="{{url('/createPaidLeave')}}">Paid Leave</a></li>
								
								<li><a href="{{url('/createOvertime')}}">Overtime</a></li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{url('/createPeminjaman')}}"><i class="fa fa-calendar-o fa-fw"></i> Shared Facilities Scheduler</a>
                        </li>
                        <li>
                            <a href="{{url('/createOBService')}}"><i class="fa fa-bell fa-fw"></i> Office Boy Services-beta</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
					@yield('contentSidebarHomepage')
       
@endsection
