@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Create Overtime</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Create Overtime Request</h2>

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
			<form action="{{url('/addOvertime')}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
					  <!--Choose the overtime date -->
						<label class="col-sm-2 control-label">Date of Overtime</label>
						<div class="col-sm-10">
							@if(isset($temp->dateot[0])){{$temp->dateot[0]}}@endif
							<input type="date" class="form-control" placeholder="Text input" name="dateot">
						</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Start Time</label>
						<!--Enter the period-->
					<div class="col-sm-10">
						@if(isset($temp->timestarts[0])){{$temp->timestarts[0]}}@endif
						<input type=time class="form-control" placeholder="Overtime time start" name="timestarts">
					</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">End Time</label>
						<!--Enter the period-->
					<div class="col-sm-10">
						@if(isset($temp->timeends[0])){{$temp->timeends[0]}}@endif
						<input type=time class="form-control" placeholder="Overtime time end" name="timeends">
					</div>
				</div>
				<div class="form-group">
						<!--Explain the reason-->
						<label class="col-sm-2 control-label">Reason</label>
						<div class="col-sm-10">
							@if(isset($temp->rsnofot[0])){{$temp->rsnofot[0]}}@endif
							<input class="form-control" placeholder="Explain your reason" name="rsnofot">
						</div>
				</div>
			  <div class="form-group">
					<!-- Button Submit-->
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">submit</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>
@endsection