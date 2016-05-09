@extends('user.sidebarHomepage')

@section('contentAdd')
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

				  <form action="{{url('/addSF')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						   <div class="form-group">
						   		@if(isset($temp->chooseFacility[0])){{$temp->chooseFacility[0]}}@endif<br/>
									<select class="form-control" name="chooseFacility" >
										<option selected disabled>Choose Facility</option>
										@foreach ($sf as $e)
											<option>{{$e->name}}</option>
										@endforeach
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
