@extends('user.sidebarAdmin')

@section('contentAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="{{url('/sFSpecialMenu')}}">Shared Facilities Special Menu</a></li>
							<li><a href="#" class="active">Create New Facility</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Create New Facility</p>
	</div>
	<br>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  @if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
				  @endif

				  <form action="{{url('/addPaidLeave')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
							 <div class="form-group">
								 <h3>Create New Facility Here</h3>
							 </div>
						  <div class="form-group">
								<input type="text" class="form-control" placeholder="Facility Name" name="facilityName">
						  </div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Facility Description" name="facilityDescription">
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
