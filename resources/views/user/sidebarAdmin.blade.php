@extends('layouts.master')
@section('contentSidebar')
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						            <li class="gaisBrandDashboard">
                            <a style="font-size:2em; text-align:center" href="{{url('/homepageGAIS')}}"><i></i> GAIS</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboardAdmin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard <b> Admin </b></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i> View My Log<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Employee Self Service <span class="fa arrow"></span></a></a>
                                    <ul class="nav nav-third-level collapse">
                                        <li>
                                            <a href="{{url('/getLogReimbursement')}}">Reimbursement</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/getLogPaidLeave')}}">Paid Leave</a>
                                        </li>
        								                  <li>
                                            <a href="{{url('/getLogOvertime')}}">Overtime</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('/getLogPeminjaman')}}">Shared Facilities Scheduler</a>
                                </li>
								                  <li>
                                    <a href="{{url('/getLogOBService')}}">Office Boy Services-beta</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{url('/sfSpecialMenu')}}"><i class="fa fa-star fa-fw"></i>Facilities <b>Special Menu</b></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
					@yield('contentAdmin')

@endsection
