@extends('user.sidebarHomepage')

@section('contentAdd')

	<section id="content">
			<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Employee Self Service</a></li>
							<li><a href="#" class="active">Create Reimburse</a></li>
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
				</ul>
			</div>
			<div id="color">
				<p id="move">Dashboard</p>
				<p id="move2">Pembuatan pengajuan Reimburse</p>
			</div>
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <br>
				  <br>
				  	<form action="{{url('/addReimbursement')}}" method="post"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  <div class="form-group">
					        <select name="category" class="selectpicker form-control">
					          <option disabled selected>Reimburse Category</option>
					          <option>Project</option>
					          <option>Other</option>
					        </select>
					      </div>
						  <div class="form-group">
							<input type="date" class="form-control" placeholder="Date Reimbursement" name="dateRem">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Reimburse Nominal (e.g. 99999)" name="cost">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Business Purpose (e.g. Shopping)" name="businesspurpose">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Description" name="descriptionRem">
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


