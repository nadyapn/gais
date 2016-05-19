@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Dashboard Admin</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Dashboard Admin</h2>
							<h4>Quick Overview of Your Activities</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="panel-body" style="margin-left:5px; margin-top:-10px; color:#333">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs">
				<li role="presentation" class="active">
					 <a href="#myLog" data-toggle="tab">
						 View My Log
					 </a>
				</li>
				<li>
					 <a href="#facilitiesMenu" data-toggle="tab">
						 Facilities Menu
					 </a>
				</li>
			</ul>
		  </ul>
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div class="tab-pane fade in active" id="myLog">
					<div class="row" style="margin-top:20px;">
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
													<span class="pull-left"><a href="{{url('/getLogReimbursement')}}">Reimbursement</span>
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
													<span class="pull-left"><a href="{{url('/getLogPaidLeave')}}">Paid Leave</span>
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
													<span class="pull-left"><a href="{{url('/getLogOvertime')}}">Overtime</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
							<!-- panel panel-red -->
					</div>
					<!-- col-lg-3 col-md-6 -->
				 </div>
		    </div>
		    <div class="tab-pane fade in" id="facilitiesMenu">
					<div class="row" style="margin-top:20px;">
							<div class="col-lg-3 col-md-6">
									<div class="panel panel-primary">
											<div class="panel-heading">
													<div class="row">
															<div class="col-xs-3">
																	<i class="fa fa-plus fa-3x"></i>
															</div>
													</div>
											</div>
											<a href="#">
													<div class="panel-footer" id="acticeToggle">
															<span class="pull-left dropdown-toggle"><a  href="{{url('/addFacility')}}">Add New Facility</a></span>
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
																	<i class="fa fa-minus fa-3x"></i>
															</div>
													</div>
											</div>
											<a href="#">
													<div class="panel-footer">
															<span class="pull-left"><a  href="{{url('/deleteFacility')}}">Delete Facility</a></span>
															<div class="clearfix"></div>
													</div>
											</a>
									</div>
							</div>
					</div>
		    </div>
		  </div>
		  <!-- /.panel-body -->
		</div>
</div>
@endsection
