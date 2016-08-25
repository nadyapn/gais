@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Create Reimburse</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Create Reimburse Request</h2>

					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			@if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
			@endif
			<form action="{{url('/addReimbursement')}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
								<!--Select The Category of Your Request -->
							@if(isset($temp->category[0])){{$temp->category[0]}}@endif
							<select name="category" class="form-control" onchange="chooseProject(value)">
								<option value="" disabled selected>Select category</option>
								<option value="Project">Project</option>
								<option value="Other">Other</option>
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
							<input type="date" class="form-control" placeholder="Text input" name="dateRem">
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nominal</label>
						<!--Explain the reason-->
					<div class="col-sm-10">
						@if(isset($temp->cost[0])){{$temp->cost[0]}}@endif
						<input class="form-control" placeholder="Enter Total of Spending (e.g. 99999)" name="cost">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Business Purpose</label>
						<!--Enter the purpose-->
					<div class="col-sm-10">
						@if(isset($temp->businesspurpose[0])){{$temp->businesspurpose[0]}}@endif
						<input class="form-control" placeholder="Enter Your Business Purpose" name="businesspurpose">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Description</label>
						<!--Explain the reason -->
					<div class="col-sm-10">
						@if(isset($temp->descriptionRem[0])){{$temp->descriptionRem[0]}}@endif
						<input class="form-control" placeholder="Explain detail of spending" name="descriptionRem">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Reimburse File</label>
						<!--Upload the File-->
					<div class="col-sm-10">
						@if(isset($temp->foto[0])){{$temp->foto[0]}}@endif
						<input type="file" class="form-control" title="Upload Reimburse File" name="foto" accept="image/*">
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


<script>
function chooseProject(category) {
	console.log(category);
	if (category === 'Project') {
		$.ajax({
	  		url: "http://localhost/GAIS/public/createReimbursement/"+category,
	  
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

@endsection
