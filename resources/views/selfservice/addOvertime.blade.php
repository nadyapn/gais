@extends('user.sidebarHomepage')

@section('contentAdd')
 	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Employee Self Service</a></li>
							<li><a href="#" class="active">Create Overtime</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Dashboard</p>
		<p id="move2">Pembuatan pengajuan Overtime</p>
	</div>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  @if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
				  @endif
				  <form action="{{url('/addOvertime')}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-inline">
					  <div class="form-group">
					  	@if(isset($temp->dateot[0])){{$temp->dateot[0]}}@endif<br/>
						<input type="date" class="form-control" placeholder="Enter Date of Overtime" name="dateot">
					  </div>
					  <div class="form-group">
					  	@if(isset($temp->timestarts[0])){{$temp->timestarts[0]}}@endif<br/>
						<input type="time" class="form-control" placeholder="Overtime time start" name="timestarts">
					  </div>
					  <div class="form-group">
					  	@if(isset($temp->timeends[0])){{$temp->timeends[0]}}@endif<br/>
						<input type="time" class="form-control" placeholder="Overtime time end" name="timeends">
					  </div>
					  <div class="form-group">
					  	@if(isset($temp->rsnofot[0])){{$temp->rsnofot[0]}}@endif<br/>
						<input type="text" class="form-control" placeholder="Reason of Overtime" name="rsnofot">
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