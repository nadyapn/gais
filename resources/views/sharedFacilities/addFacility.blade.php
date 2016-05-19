@extends('user.sidebarAdmin')
@section('contentAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardAdmin')}}">Dashboard Admin</a></li>
				<li><a href="{{url('/sfSpecialMenu')}}">Shared Facilites Special Menu</a></li>
				<li class="active">Add New Facility</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Create New Facility</h2>
							<h4>Add new facility here</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			@if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
				  @endif
			<form action="{{url('/addFacility')}}" method="post" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label">Facility Name</label>
						<!--Input the Facility Name-->
					<div class="col-sm-10">
						@if(isset($temp->facilityName[0])){{$temp->facilityName[0]}}@endif
						<input type="text" class="form-control" placeholder="Facility Name" name="facilityName">
					</div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label">Choose Facility Category</label>
						<div class="col-sm-10">
							<!--Select Category of Your Request -->
							@if(isset($temp->category[0])){{$temp->category[0]}}@endif
							<select class="form-control" name="category">
								<option>Room</option>
								<option>Equipment</option>
								<option>Other</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Facility Description</label>
						<!--Input the Facility Description-->
					<div class="col-sm-10">
						@if(isset($temp->facilityDescription[0])){{$temp->facilityDescription[0]}}@endif
						<input type="text" class="form-control" placeholder="Facility Description" name="facilityDescription">
					</div>
				</div>
			  <div class="form-group">
					<!-- Button Submit-->
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">SUBMIT</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>
@endsection
