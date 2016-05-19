@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
		<div class="row" style="margin-left:10px;">
				<div class="col-lg-12">
					<div class="page-header">
						<h2>Welcome to Homepage, <b>{{\Auth::user()->name}}</b>!</h2>
						<h3 style="color:#777">Choose Your Request Here</h3>
					</div>
				</div>
				<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row" style="margin-left:10px;">
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
								<div class="panel-heading">
										<div class="row">
												<div class="col-xs-3">
														<i class="fa fa-users fa-3x"></i>
												</div>
										</div>
								</div>
								<a href="#">
										<div class="panel-footer" id="acticeToggle">
												<span class="pull-left dropdown-toggle"> Employee Self Service</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
										</div>
								</a>
						</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
								<div class="panel-heading">
										<div class="row">
												<div class="col-xs-3">
														<i class="fa fa-calendar fa-3x"></i>
												</div>
										</div>
								</div>
								<a href="#">
										<div class="panel-footer">
												<span class="pull-left"><a  href="{{url('/createPeminjaman')}}">Shared Facilities Scheduler</a></span>
												<div class="clearfix"></div>
										</div>
								</a>
						</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
								<div class="panel-heading">
										<div class="row">
												<div class="col-xs-3">
														<i class="fa fa-bell fa-3x"></i>
												</div>
										</div>
								</div>
								<a href="#">
										<div class="panel-footer">
												<span class="pull-left"><a href="{{url('/createOBService')}}">Office Boy Services</a></span>
												<div class="clearfix"></div>
										</div>
								</a>
						</div>
				</div>
		</div>
		<!-- Ini Toggle Self-service-->
		<div class="toggle">
			 <div class="row" id="selfServiceHide" style="margin-left:10px; width:75%; display:none">
				 <div class="page-header" style="margin-top:-1px;margin-left:15px;">
				 </div>
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
								<div class="panel-heading">
										<div class="row">
												<div class="col-xs-3">
														<i class="fa fa-dollar fa-3x"></i>
												</div>
										</div>
								</div>
								<a href="#">
										<div class="panel-footer">
												<span class="pull-left"><a href="{{url('/createReimbursement')}}">Reimbursement</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
												<div class="clearfix"></div>
										</div>
								</a>
						</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
								<div class="panel-heading">
										<div class="row">
												<div class="col-xs-3">
														<i class="fa fa-plane fa-3x"></i>
												</div>
										</div>
								</div>
								<a href="#">
										<div class="panel-footer">
												<span class="pull-left"><a href="{{url('/createPaidLeave')}}">Paid Leave</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><a/>
												<div class="clearfix"></div>
										</div>
								</a>
						</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
								<div class="panel-heading">
										<div class="row">
												<div class="col-xs-3">
														<i class="glyphicon glyphicon-time" style="font-size: 2.75em;"></i>
												</div>
										</div>
								</div>
								<a href="#">
										<div class="panel-footer">
												<span class="pull-left"><a href="{{url('/createOvertime')}}">Overtime</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
												<div class="clearfix"></div>
										</div>
								</a>
						</div>
						<!-- panel panel-red -->
				</div>
				<!-- col-lg-3 col-md-6 -->
		</div>
		<!-- /.row2-->
	</div>
	<!-- /.toggle -->
</div>
<!-- /#page-wrapper -->
@endsection