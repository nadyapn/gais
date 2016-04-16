@extends('user.sidebarHomepage')

@section('contentAdd')

	<section id="content">

			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Create Paid Leave Request</h2>
				  <h4>Make your Paid Leave request</h4>
				  <br>
				  
				  <form action="{{url('/addPaidLeave')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  <div class="form-group">
							<input type="date" class="form-control" placeholder="Enter Date Hired" name="datehired">
						  </div>
						   <div class="form-group">
							<select name="periodofleave" >
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
							<select name="category">
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
@endsection
