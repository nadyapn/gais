@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
				<li class="active">Shared Facilites Special Menu</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
		<div class="row" style="margin-left:10px;">
				<div class="col-lg-12">
					<div class="page-header">
						<h2>Welcome to Shared Facilities Special Menu, <b>{{\Auth::user()->name}}</b>!</h2>
						<h3 style="color:#777">Choose Your Menu Here</h3>
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
<!-- /#page-wrapper -->
@endsection
