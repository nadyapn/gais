@extends('user.sidebarHomepage')

@section('contentAdd')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Employee Self Service</a></li>
							<li><a href="#" class="active">Create Paid Leave</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Dashboard</p>
		<p id="move2">Pembuatan pengajuan Paid Leave</p>
	</div>
	<div id="color2">
		<!-- Jatah ini muncul sesuai quota berapa kali dia bisa cuti-->
		<p id="move7">Your Paid Leave Quota</p>
		<p class="move8">12</p>
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
				  <form action="{{url('/addPaidLeave')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  <div class="form-group">
								<h4 style="text-align:left ; margin-left:32.5% ; margin-bottom:-1%">Start Date</h4>
						  	@if(isset($temp->datehired[0])){{$temp->datehired[0]}}@endif<br/>
<<<<<<< HEAD
								<input type="date" class="form-control" name="datehired">
=======
							<input type="date" class="form-control" placeholder="Enter Date Hired" name="datehired">
						  </div>
						   <div class="form-group">
						   	@if(isset($temp->periodofleave[0])){{$temp->periodofleave[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Periode of Leave" name="periodofleave">
>>>>>>> 07a265f6269f8fd07b139d4e03dfac95a4379949
						  </div>
							<div class="form-group">
								<h4 style="text-align:left ; margin-left:32.5% ; margin-bottom:-1%; margin-top:-1.2%;">End Date</h4>
							 	@if(isset($temp->datehired[0])){{$temp->datehired[0]}}@endif<br/>
						 		<input type="date" class="form-control" name="datehired">
						 </div>
						  <div class="form-group">
						  	@if(isset($temp->rsnofleave[0])){{$temp->rsnofleave[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Explain Your Reason" name="rsnofleave">
						  </div>
						  <div class="form-group">
						  	@if(isset($temp->category[0])){{$temp->category[0]}}@endif<br/>
							<select class="form-control" name="category" >
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
