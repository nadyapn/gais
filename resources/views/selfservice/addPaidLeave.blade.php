@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Create Paid Leave</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Create Paid Leave Request</h2>

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
			<form action="{{url('/addPaidLeave')}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
								<!--Select The category of Your Request -->
							@if(isset($temp->category[0])){{$temp->category[0]}}@endif
							<select name="category" class="form-control">
								<option value="sick">Sick</option>
								<option value="maternity">Maternity</option>
								<option value="other">Other</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					  <!--Choose the leave date -->
						<label class="col-sm-2 control-label">Date Hired</label>
						<div class="col-sm-10">
							@if(isset($temp->datehired[0])){{$temp->datehired[0]}}@endif
							<input type="date" class="form-control" placeholder="Text input" name="datehired">
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Period</label>
						<!--Enter the period-->
					<div class="col-sm-10">
						@if(isset($temp->periodofleave[0])){{$temp->periodofleave[0]}}@endif
						<input class="form-control" placeholder="Period of Leave" name="periodofleave">
					</div>
				</div>
				<div class="form-group">
						<!--Explain the reason-->
						<label class="col-sm-2 control-label">Reason</label>
						<div class="col-sm-10">
							@if(isset($temp->rsnofleave[0])){{$temp->rsnofleave[0]}}@endif
							<input class="form-control" placeholder="Explain your reason" name="rsnofleave">
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
							{{$total_leave}}
						</p>
					</div>
			</div>
		</div>
	</div>
</div>

@endsection
