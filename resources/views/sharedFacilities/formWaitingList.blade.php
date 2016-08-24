@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li><a class="active">Create Shared Facilities Scheduler</a></li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Waiting List Form</h2>
							<h4>Waiting List Request for {{session()->get('sfname', 'default')}}</h4>
							<h4>List <?php $no = 1; ?> </h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->

		<!-- Table Waiting List-->
	<div class="row">
		<div class="col-lg-12">
			@if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
			@endif
			<div style="margin-top:10px; margin-left:15px" class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="dataTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Employee's Name</th>
							<th>Status</th>
							<th>Start Time</th>
							<th>End Time</th>
						</tr>
					</thead>
					<tbody>
						<!-- For Each -->
						@foreach($wl as $e)
						<tr>
								<td>{{$no}}</td>
								<td>{{$e->name}}</td>
								<td>
									@if($e->status == 0)
										Booked
									@elseif($e->status == 1)
										Waiting list
									@endif
								</td>
								<td>{{$e->time_start}}</td>
								<td>{{$e->time_end}}</td>
						</tr>
						<?php $no = $no + 1; ?>
						@endforeach
						<!-- End For Each -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- End Table Waiting List-->
	<br>
	<!-- Form Waiting List-->
	<div class="row">
		<div class="col-lg-12">
			<form action="{{url('addWaitingList/'.$tanggal.'/'.$waktu)}}" method="POST" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-group">
					<label class="col-sm-2 control-label">Date of Use</label>
					<div class="col-sm-10">
						<h6>{{$tanggal}}</h6>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Start time</label>
					<div class="col-sm-10">
							<h6>{{$waktu}}</h6>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">End time</label>
					<div class="col-sm-10">
						@if(isset($temp->endtime[0])){{$temp->endtime[0]}}
						@elseif($salahjam != ""){{$salahjam}}
						@endif
						<input type="time" class="form-control" placeholder="" name="endtime">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Enter your purpose</label>
					<div class="col-sm-10">
							@if(isset($temp->description[0])){{$temp->description[0]}}@endif
							<input type="textarea" class="form-control" placeholder="e.g. For meeting" name="description">
					</div>
				</div>
				<div class="form-group">
					<!-- Button Submit-->
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" value="WAITING LIST" class="btn btn-secondary"></input>
					</div>
				</div>
			</form>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- End Form Waiting List-->

</div>
@endsection
