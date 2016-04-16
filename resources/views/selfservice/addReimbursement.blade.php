@extends('user.sidebarHomepage')

@section('contentAdd')
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Create Reimburse Request</h2>
				  <h4>Make your reimburse request</h4>
				  <br>
				  @if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
					@foreach ($messages->all() as $message)
						{{$message}} <br/>
					@endforeach
				@endif
				  	<form action="{{url('/addReimbursement')}}" method="post"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  
						  <div class="form-group">
						  	  <div class="form-control">
					              <div class='input-group date'>
					                <span class="input-group-addon">
					                	@if(isset($temp->dateRem[0])){{$temp->dateRem[0]}}@endif<br/>
					                      <img style="margin-left:10%;" src="img/Icon - Calendar.png"> Date of Event 
					                       <input style="margin-right:50%;" class="btn btn-default2" type="date" name="dateRem">
					                </span>
					              </div>
					          </div>
				          </div>
				          <div class="form-group">
				          	@if(isset($temp->businesspurpose[0])){{$temp->businesspurpose[0]}}@endif<br/>
							<input value="@if(isset($in)){{$in['businesspurpose']}}@endif" type="text" class="form-control" placeholder="Enter Your Business Purpose (e.g. Shopping)" name="businesspurpose">
						  </div>
						  <div class="form-group">
					        <select name="category">
					          <option disabled selected>Choose Your Reimburse Category</option>
					          <option>Project</option>
					          <option>Other</option>
					        </select>
					      </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Explain Detail of Spending" name="descriptionRem">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Total of Spending (e.g. 99999)" name="cost">
						  </div>
						  	<div class="form-group">
							<input type="file" class="form-control" title="Upload Reimburse File" name="foto" accept="image/*">
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


