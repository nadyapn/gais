@extends('user.sidebarHomepage')

@section('contentAdd')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{url('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="#" class="active">Create Shared Facilities Scheduler</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Create Shared Facilities Scheduler Request</p>
		<p id="move2">Request for {{session()->get('sfname', 'default')}}</p>
	</div>
	<br>
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  @if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
				  @endif

				  	<form action="{{url('addPeminjaman/'.$tanggal.'/'.$waktu)}}" method="POST">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						   	<div class="form-group">
						   		<h5>Date of use</h5>
								<h6>{{$tanggal}}</h6>
						   	</div>
						   	<div class="form-group">
						   		<h5>Start time</h5>
						   		<h6>{{$waktu}}</h6>
						   	</div>
						   	<div class="form-group">
						   		@if(isset($temp->endtime[0])){{$temp->endtime[0]}}
						   		@elseif($salahjam != ""){{$salahjam}}
						   		@endif
						   		<h5>End time</h5>
						   		<input type="time" class="form-control" placeholder="<?php echo $waktu ?>" name="endtime">
						   	</div>
						   	<div class="form-group">
						   		@if(isset($temp->description[0])){{$temp->description[0]}}@endif
						   		<h5>Enter your need for using this facility</h5>
						   		<input type="textarea" class="form-control" placeholder="For meeting" name="description">
						   	</div>
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-secondary"></input>
							</div>
						</div>
					</form>
				</div>
			  </div>
			</div>
	</section>
@endsection
