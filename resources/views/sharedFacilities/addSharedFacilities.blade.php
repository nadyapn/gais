@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="#" class="active">Create Shared Facilities Scheduler</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Create Shared Facilities Scheduler Request</p>
		<p id="move2"></p>
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

				  <form action="{{url('/addSharedFacilities')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						   <div class="form-group">
									<select class="form-control" name="chooseRoom" >
										<option selected disabled>chooseRoom</option>
										<option value="room1">Room 1</option>
										<option value="room2">Room 2</option>
									</select>
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
