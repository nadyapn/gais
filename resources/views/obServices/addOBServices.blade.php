@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="#" class="active">Create OB Service</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Create OB Service Request</p>
		<p id="move2">*Your Request will be granted after <b> one hour </b> of your request time</p>
	</div>
	<div id="color2">
		<p id="move7">Today's date</p>
		<p class="move6" id="dateForPage"></p>
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

				  <form action="{{url('/addPaidLeave')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
							 <div class="form-group">
								 <h3>Create Your OB Service Request Here</h3>
							 </div>

						   <div class="form-group">
								<select class="form-control" name="category" >
									<option selected disabled>Category</option>
									<option value="food">Food</option>
									<option value="doc">Document</option>
									<option value="other">Other</option>
								</select>
						  </div>
						  <div class="form-group">
								<select class="form-control" name="requestedTime">
									<option selected disabled>Time</option>
									<option value="08.00">08.00 - 09.00</option>
									<option value="10.00">10.00 - 11.00</option>
									<option value="12.00">12.00 - 13.00</option>
									<option value="14.00">14.00 - 15.00</option>
									<option value="16.00">16.00 - 17.00</option>
								</select>
						  </div>
						  <div class="form-group">
								<input type="text" class="form-control" placeholder="Location" name="obLocation">
						  </div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Description" name="obDescription">
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
