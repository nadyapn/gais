@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="{{url('/getMyOBServices')}}">OB Service - beta History</a></li>
							<li><a href="#" class="active">Update OB Service</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Update OB Service Request</p>
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
								 <h3>Update Your OB Service Request Here</h3>
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
								<input type="submit" value="Update" class="btn btn-secondary"></input>
						  </div>
						</div>
					</form>
				</div>
			  </div>
			</div>
	</section>
@endsection
