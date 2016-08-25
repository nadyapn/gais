@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a class="active">Create Shared Facilities Scheduler</a></li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Shared Facilities Scheduler Request Form</h2>
				<h4>Request for {{session()->get('sfname', 'default')}}</h4>
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
			<form action="{{url('addPeminjaman/'.$tanggal.'/'.$waktu)}}" method="POST" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label">Date of Use</label>
					<div class="col-sm-10">
						<h6>{{$tanggal}}</h6>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
						<h6>{{$waktu}}</h6>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
						@if(isset($temp->endtime[0])){{$temp->endtime[0]}}
						@elseif(isset($salahjam)){{$salahjam}}
						@endif
						<input type="time" class="form-control" placeholder="" name="endtime">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Enter your purpose</label>
					<div class="col-sm-10">
							@if(isset($temp->description[0])){{$temp->description[0]}}@endif
							<input type="textarea" class="form-control" placeholder="e.g. For meeting" name="description">
					</div>
				</div>
			  
			    <div class="form-group">
					<input type="submit" value="BOOK" class="btn btn-secondary"></input>
				</div>
			  </div>
			</form>
		</div>
	</div>
</div>
@endsection
