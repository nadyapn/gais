@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')

<!-- For Reimburse -->
@if (isset($rm))
	@if(isset($messages))
		<?php
			$temp = JSON_decode($messages);
		?>
	@endif
<div id="page-wrapper">
	<div class="row">
		<!--BREADCRUMB -->
		<ol class="breadcrumb">
			<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
			<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
			<li class="active">Edit Reimbursement</li>
		</ol>
		<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Edit Reimbursement <b> {{$ss->kodeSS}} </b> </h2>
				<h4>Update your reimbursement request</h4>
			</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Form for Reimbursement -->
		<div class="row">
			<div class="col-lg-12">
				<form action="{{url('/update/'.$ss->kodeSS)}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-group">
							<label class="col-sm-2 control-label">Category</label>
							<div class="col-sm-10">
								<!--Select The Category of Your Request -->
								@if(isset($temp->category[0])){{$temp->category[0]}}@endif
								<select name="category" class="form-control" onchange="chooseProject(value)">
									<option value="" disabled>Select category</option>
									<option value="Project" @if($rm->category === 'Project') selected @endif>Project</option>
									<option value="Other" @if($rm->category === 'Other') selected @endif>Other</option>
								</select>
							</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Project</label>
						<div class="col-sm-10 projectcontainer">
							<!--Select The Project of Your Request -->
							@if(isset($temp->project[0])){{$temp->project[0]}}@endif
						</div>
					</div>
					<div class="form-group">
							<label class="col-sm-2 control-label">Requested Date</label>
							<div class="col-sm-10">
								@if(isset($temp->dateRem[0])){{$temp->dateRem[0]}}@endif
								<input type="date" class="form-control" placeholder="Text input" value="{{$ss->request_date}}" name="dateRem">
							</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nominal</label>
							<!--Explain the reason-->
						<div class="col-sm-10">
							@if(isset($temp->cost[0])){{$temp->cost[0]}}@endif
							<input class="form-control" placeholder="Enter Total of Spending (e.g. 99999)" value="{{$rm->cost}}" name="cost">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Business Purpose</label>
							<!--Enter the purpose-->
						<div class="col-sm-10">
							@if(isset($temp->businesspurpose[0])){{$temp->businesspurpose[0]}}@endif
							<input class="form-control" placeholder="Enter Your Business Purpose" value="{{$rm->business_purpose}}" name="businesspurpose">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
							<!--Explain the reason -->
						<div class="col-sm-10">
							@if(isset($temp->descriptionRem[0])){{$temp->descriptionRem[0]}}@endif
							<input class="form-control" placeholder="Explain detail of spending" value="{{$ss->description}}" name="descriptionRem">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Reimburse File</label>
							<!--Upload the File-->
						<div class="col-sm-10">
							@if(isset($temp->foto[0])){{$temp->foto[0]}}@endif
							<input type="file" class="form-control" title="Upload Reimburse File" value="{{$rm->photo}}" name="foto" accept="image/*">
						</div>
					</div>
				  <div class="form-group">
						<!-- Button Submit-->
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">submit</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
</div>
<!-- End of Reimburse-->

<!-- For Paid Leave -->
@elseif (isset($pl))	@if(isset($messages))
<?php
	$temp = JSON_decode($messages);
?>
@endif
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Edit Paid Leave</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Edit Paid Leave <b> {{$ss->kodeSS}} </b></h2>
				<h4>Update your paid leave request</h4>
			</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->

	<!-- Form for Paid Leave -->
	<div class="row">
		<div class="col-lg-12">
			<form action="{{url('/update/'.$ss->kodeSS)}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
								<!--Select The category of Your Request -->
							@if(isset($temp->category[0])){{$temp->category[0]}}@endif
							<select name="category" class="form-control">
								<option value="sick" @if($pl->category == 'sick') selected @endif>Sick</option>
								<option value="maternity" @if($pl->category == 'maternity') selected @endif>Maternity</option>
								<option value="other" @if($pl->category == 'other') selected @endif>Other</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					  <!--Choose the leave date -->
						<label class="col-sm-2 control-label">Requested Date</label>
						<div class="col-sm-10">
							@if(isset($temp->datehired[0])){{$temp->datehired[0]}}@endif
							<input type="date" class="form-control" placeholder="Text input" value="{{$pl->date_hired}}" name="datehired">
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Period</label>
						<!--Enter the period-->
					<div class="col-sm-10">
						@if(isset($temp->periodofleave[0])){{$temp->periodofleave[0]}}@endif
						<input class="form-control" placeholder="Period of Leave" value="{{$pl->period_of_leave}}" name="periodofleave">
					</div>
				</div>
				<div class="form-group">
					<!--Explain the reason-->
					<label class="col-sm-2 control-label">Reason</label>
					<div class="col-sm-10">
						@if(isset($temp->rsnofleave[0])){{$temp->rsnofleave[0]}}@endif
						<input class="form-control" placeholder="Explain your reason" value="{{$ss->description}}" name="rsnofleave">
					</div>
				</div>
			  <div class="form-group">
					<!-- Button Submit-->
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">submit</button>
			    </div>
			  </div>
			</form>
			<!-- User's Paid Leave Quota-->
			<div class="panel panel-default" style="margin-left:10px;">
				  <div class="panel-heading">
						 <h4 style="font-family:'roboto';font-size:1.1em;font-weight:bold;"> Your Paid Leave Quota </h4>
					</div>
					<div class="panel-body" style="">
						<p style="font-family:'DIN','DINPro';font-size:1em;"> 
							<!-- User's Paid Leave Quota--> 
							{{$total_leave}}
						</p>
					</div>
			</div>
		</div>
	</div>
</div>

<!-- End of Paid leave-->

<!-- For Overtime -->
@elseif (isset($ot))
	@if(isset($messages))
		<?php
			$temp = JSON_decode($messages);
		?>
	@endif
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a href="{{url('/dashboardNonAdmin')}}">Dashboard Non Admin</a></li>
				<li class="active">Edit overtime Request</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Edit overtime <b> {{$ss->kodeSS}} </b></h2>
				<h4>Update your overtime request</h4>
			</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<!-- Table for Overtime -->
	<div class="row">
		<div class="col-lg-12">
			<form action="{{url('/update/'.$ss->kodeSS)}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
					<!--Choose the overtime date -->
					<label class="col-sm-2 control-label">Requested Date</label>
					<div class="col-sm-10">
						@if(isset($temp->dateot[0])){{$temp->dateot[0]}}@endif
						<input type="date" class="form-control" placeholder="Text input" value="{{$ot->date}}" name="dateot">
					</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Start Time</label>
						<!--Enter the period-->
					<div class="col-sm-10">
						@if(isset($temp->timestarts[0])){{$temp->timestarts[0]}}@endif
						<input type=time class="form-control" placeholder="Overtime time start" value="{{$ot->time_start}}" name="timestarts">
					</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">End Time</label>
						<!--Enter the period-->
					<div class="col-sm-10">
						@if(isset($temp->timeends[0])){{$temp->timeends[0]}}@endif
						<input type=time class="form-control" placeholder="Overtime time end" value="{{$ot->time_end}}" name="timeends">
					</div>
				</div>
				<div class="form-group">
					<!--Explain the reason-->
					<label class="col-sm-2 control-label">Reason</label>
					<div class="col-sm-10">
						@if(isset($temp->rsnofot[0])){{$temp->rsnofot[0]}}@endif
						<input type="textarea" class="form-control" placeholder="Explain your reason" value="{{$ss->description}}" name="rsnofot">
					</div>
				</div>
			  <div class="form-group">
					<!-- Button Submit-->
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">submit</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>
<!-- End of Overtime-->
@else
	Error
@endif

<script>
function chooseProject(category) {
	console.log(category);
	if (category === 'Project') {
		$.ajax({
	  		url: "http://localhost/gais/public/updateReimbursement/"+category,
	  
		})
	  	.done(function( data ) {
	  		console.log(data);
	    	$(".projectcontainer").html(data); 
	  	});
	}
	else {
		$(".projectcontainer").empty(); 
	}
}
</script>
<!-- End of IF-->
@endsection


