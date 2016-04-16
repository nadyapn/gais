@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')

@if (isset($rm))
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Edit Reimburse Request</h2>
				  <br>
				  	<form action="{{url('/update/'.$ss->kodeSS)}}" method="post"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  
						  <div class="form-group">
						  	  <div class="form-control">
					              <div class='input-group date'>
					                <span class="input-group-addon">
					                      <img style="margin-left:10%;" src="img/Icon - Calendar.png"> Date of Event 
					                       <input style="margin-right:50%;" class="btn btn-default2" type="date" name="dateRem">
					                </span>
					              </div>
					          </div>
				          </div>
				          <div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Your Business Purpose (e.g. Shopping)" name="businesspurpose">
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
	
@elseif (isset($pl))
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Edit Paid Leave Request</h2>
				  <br>
				  
				  <form action="{{url('/update/'.$ss->kodeSS)}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  <div class="form-group">
							<input type="date" class="form-control" placeholder="Enter Date Hired" name="datehired">
						  </div>
						   <div class="form-group">
							<select name="periodofleave">
								<option selected disabled>Choose Your Month Of Leave</option>
								<option value="jan">January</option>
								<option value="feb">February</option>
								<option value="mar">March</option>
								<option value="apr">April</option>
								<option value="may">May</option>
								<option value="jun">June</option>
								<option value="jul">July</option>
								<option value="aug">August</option>
								<option value="sept">September</option>
								<option value="oct">October</option>
								<option value="nov">November</option>
								<option value="dec">December</option>
							</select>
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Explain Your Reason" name="rsnofleave">
						  </div>
						  <div class="form-group">
							<select name="category" class="selectpicker form-control">
								<option selected disabled>Choose Your Reason Category</option>
								<option value="sick">Sick</option>
								<option value="maternity">Maternity</option>
								<option value="other">Other</option>
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
@elseif (isset($ot))
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Edit Overtime Request</h2>
				  <br>
				  <form action="{{url('/update/'.$ss->kodeSS)}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-inline">
					  <div class="form-group">
						<input type="date" class="form-control" placeholder="Enter Date of Overtime" name="dateot">
					  </div>
					  <div class="form-group">
						<input type="time" class="form-control" placeholder="Overtime time start" name="timestarts">
					  </div>
					  <div class="form-group">
						<input type="time" class="form-control" placeholder="Overtime time end" name="timeends">
					  </div>
					  <div class="form-group">
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
@endif

@endsection