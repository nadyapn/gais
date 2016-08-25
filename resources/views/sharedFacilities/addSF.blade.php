@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Shared Facilities Scheduler Request</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<!--HEADER -->
			<div class="page-header2">
				<h2>Create Shared Facilities Scheduler Request</h2>
				<h4>Book Your Room Here</h4>
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
			<form action="{{url('/addSF')}}" method="post" class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<div class="form-inline">
					<div class="form-group">
						@if(isset($temp->chooseFacility[0])){{$temp->chooseFacility[0]}}@endif<br/>
						<select class="form-control" name="chooseFacility" >
							<option selected disabled>Choose Facility</option>
							@foreach ($sf as $e)
								<option>{{$e->sfname}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Choose" class="btn btn-secondary"></input>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
