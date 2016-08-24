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
                        @if(\Auth::user()->position === 'Team Leader' || \Auth::user()->position === 'Head of Business Unit' || \Auth::user()->position === 'Head of HR')
                        <li>
                            <a href="#"><i class="fa fa-check fa-fw"></i>My Approval<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li>
                                  <a href="{{url('/myApproval')}}">Employee Self Service</a></a>
                              </li>
                            </ul>
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-history fa-fw"></i> My History<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <a href="#">Employee Self-Service<span class="fa arrow"></span></a>
                                  <ul class="nav nav-third-level">
                                      <li>
                                          <a href="{{url('/getMyReimbursement')}}">Reimbursement</a>
                                      </li>
                                      <li>
                                          <a href="{{url('/getMyPaidLeave')}}">Paid Leave</a>
                                      </li>
                                        <li>
                                          <a href="{{url('/getMyOvertime')}}">Overtime</a>
                                      </li>
                                  </ul>
                                </li>
                                <li>
                                    <a href="{{url('/getMyPeminjaman')}}">Shared Facilities Scheduler</a>
                                </li>
								                  <li>
                                    <a href="{{url('/getMyOBService')}}">Office Boy Services - beta</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
					@yield('contentNonAdmin')    

@endsection