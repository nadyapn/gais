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
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
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
				  <br>
				  @if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
				  @endif
				  	<form action="{{url('/addReimbursement')}}" method="post"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  
						  <div class="form-group">
						  	  <div class="form-control">
					              <div class='input-group date'>
					                <span class="input-group-addon">
					                	@if(isset($temp->dateRem[0])){{$temp->dateRem[0]}}@endif<br/>
					                      <img style="margin-left:10%;" src="img/Icon - Calendar.png"> Date of Event 
					                       <input style="margin-right:50%;" class="btn btn-default2" type="date" name="dateRem">
					                </span>
					              </div>
					          </div>
				          </div>
				          <div class="form-group">
				          	@if(isset($temp->businesspurpose[0])){{$temp->businesspurpose[0]}}@endif<br/>
							<input value="@if(isset($in)){{$in['businesspurpose']}}@endif" type="text" class="form-control" placeholder="Enter Your Business Purpose (e.g. Shopping)" name="businesspurpose">
						  </div>
						  <div class="form-group">
						  	@if(isset($temp->category[0])){{$temp->category[0]}}@endif<br/>
					        <select name="category" >
					          <option disabled selected>Choose Your Reimburse Category</option>
					          <option>Project</option>
					          <option>Other</option>
					        </select>
					      </div>
						  <div class="form-group">
						  	@if(isset($temp->descriptionRem[0])){{$temp->descriptionRem[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Explain Detail of Spending" name="descriptionRem">
						  </div>
						  <div class="form-group">
						  	@if(isset($temp->cost[0])){{$temp->cost[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Enter Total of Spending (e.g. 99999)" name="cost">
						  </div>
						  	<div class="form-group">
						  	@if(isset($temp->foto[0])){{$temp->foto[0]}}@endif<br/>
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


