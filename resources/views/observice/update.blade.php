@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Update OB Service Request</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Update Your OB Request</h2>
							<h4>*Your Request will be granted after one hour of your request time</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<form action="{{url('/updateOBS/'.$obs->kodeOBS)}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
						<label class="col-sm-2 control-label">OB's Name</label>
						<div class="col-sm-10 obcontainer" >
							
						</div>
				</div>

				<div class="form-group">
						
						<label class="col-sm-2 control-label">Category</label>
						@if(isset($temp->category[0])){{$temp->category[0]}}@endif<br/>
						<div class="col-sm-10">
							<!--Select Category of Your Request -->
							<select name="category" class="form-control">
									<option>Food</option>
									<option>Document</option>
									<option>Send</option>
									<option>Other</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					
					@if(isset($temp->requestedTime[0])){{$temp->requestedTime[0]}}@endif<br/>
						  		@if(isset($salahjam)) {{$salahjam}}@endif<br/>
						<label class="col-sm-2 control-label">Time</label>
						<div class="col-sm-10">
								<!--Select Time of Your Request -->
							<select name="requestedTime" class="form-control" onchange="chooseOB(value)">
									<option value="" disabled selected>Select time</option>
									<option value="08:00">08.00 - 09.00</option>
									<option value="10:00">10.00 - 11.00</option>
									<option value="12:00">12.00 - 13.00</option>
									<option value="14:00">14.00 - 15.00</option>
									<option value="16:00">16.00 - 17.00</option>
									<option value="23:00">23.00 - 00.00</option>
									<option value="00:00">00.00 - 01.00</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					@if(isset($temp->obDescription[0])){{$temp->obDescription[0]}}@endif
					<label class="col-sm-2 control-label">Description</label>
					<!--Input the Description-->
					<div class="col-sm-10">
						<input class="form-control" name="obDescription" placeholder="Enter your request description (location, qty, etc)">
					</div>
				</div>
			  <div class="form-group">
					<!-- Button Submit-->
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Order</button>
			    </div>
			  </div>
			</form>
			<!-- Today's Date-->
			<div class="panel panel-default" style="margin-left:10px;">
				  <div class="panel-heading">
						 <h4 style="font-family:'roboto';font-size:1.1em;font-weight:bold;"> Today's Date </h4>
					</div>
					<div class="panel-body" style="">
							<p style="font-family:'DIN','DINPro';font-size:1em;" id="dateForPage"> </p>
					</div>
			</div>
		</div>
	</div>
</div>
<script>
function chooseOB(time) {
	console.log(time);
	$.ajax({
	  url: "http://localhost/gais/public/updateOBService/"+time,
	  
	})
	  .done(function( data ) {
	  	console.log(data);
	    $(".obcontainer").html(data); 
	  });
}
</script>
@endsection
