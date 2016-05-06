@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')

@if (isset($rm))
	@if(isset($messages))
		<?php
			$temp = JSON_decode($messages);
		?>
	@endif
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#">Reimbursement History</a></li>
							<li><a href="#" class="active">Edit Reimbursement</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
		<div id="color">
			<p id="move">Edit Reimbursement</p>
			<p id="move2">Perbarui Pengajuan Reimbursement</p>
	</div>
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				  	<form action="{{url('/update/'.$ss->kodeSS)}}" method="post"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  
						  <div class="form-group">
						  	  <div class="form-control">
					              <div class='input-group date'>
					                <span class="input-group-addon">
					                      @if(isset($temp->dateot[0])){{$temp->dateot[0]}}@endif<br/>
					                      <img style="margin-left:10%;" src="{{asset('img/Icon - Calendar.png')}}"> Date of Event  
					                       <input style="margin-right:50%;" class="btn btn-default2" type="date" name="dateRem">
					                </span>
					              </div>
					          </div>
				          </div>
				          <div class="form-group">
							@if(isset($temp->businesspurpose[0])){{$temp->businesspurpose[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Enter Your Business Purpose (e.g. Shopping)" name="businesspurpose">
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
							
							  	@if(isset($temp->project[0])){{$temp->project[0]}}@endif<br/>
						        <select name="project" >
						          <option disabled selected>Choose Your Project</option>
						          @foreach ($workson as $f)
						          	<option>{{$f->name}}</option>
						           @endforeach
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
	
@elseif (isset($pl))
	@if(isset($messages))
	<?php
	  	$temp = JSON_decode($messages);
	?>
	@endif
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#">Paid Leave History</a></li>
							<li><a href="#" class="active">Edit Paid Leave</a></li>
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
				</ul>
			</div>
		<div id="color">
			<p id="move">Edit Paid Leave</p>
			<p id="move2">Perbarui Pengajuan Paid Leave</p>
		</div>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <br>
				  
				  <form action="{{url('/update/'.$ss->kodeSS)}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  <div class="form-group">
						  	@if(isset($temp->datehired[0])){{$temp->datehired[0]}}@endif<br/>
							<input type="date" class="form-control" placeholder="Enter Date Hired" name="datehired">
						  </div>
						   <div class="form-group">
						   	@if(isset($temp->periodofleave[0])){{$temp->periodofleave[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Periode of Leave" name="periodofleave">
						  </div>
						  <div class="form-group">
						  	@if(isset($temp->rsnofleave[0])){{$temp->rsnofleave[0]}}@endif<br/>
							<input type="text" class="form-control" placeholder="Explain Your Reason" name="rsnofleave">
						  </div>
						  <div class="form-group">
							@if(isset($temp->category[0])){{$temp->category[0]}}@endif<br/>
							<select name="category" >
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
@elseif (isset($ot))
	@if(isset($messages))
		<?php
			$temp = JSON_decode($messages);
		?>
	@endif
<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							<li><a href="#">Homepage</a></li>
							<li><a href="#">Dashboard Non Admin</a></li>
							<li><a href="#">Overtime History</a></li>
							<li><a href="#" class="active">Edit Overtime</a></li>
						</ul>
					<button type="button" class="btn btn-secondary2">Back to Home</button>
				</ul>
			</div>
		<div id="color">
			<p id="move">Edit Overtime</p>
			<p id="move2">Perbarui Pengajuan Overtime</p>
		</div>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <br>
				  <form action="{{url('/update/'.$ss->kodeSS)}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-inline">
					  <div class="form-group">
					  	@if(isset($temp->dateot[0])){{$temp->dateot[0]}}@endif<br/>
						<input type="date" class="form-control" placeholder="Enter Date of Overtime" name="dateot">
					  </div>
					  <div class="form-group">
					  	@if(isset($temp->timestarts[0])){{$temp->timestarts[0]}}@endif<br/>
						<input type="time" class="form-control" placeholder="Overtime time start" name="timestarts">
					  </div>
					  <div class="form-group">
					  	@if(isset($temp->timeends[0])){{$temp->timeends[0]}}@endif<br/>
						<input type="time" class="form-control" placeholder="Overtime time end" name="timeends">
					  </div>
					  <div class="form-group">
						@if(isset($temp->rsnofot[0])){{$temp->rsnofot[0]}}@endif<br/>
						<input type="text" class="form-control" placeholder="Reason of Overtime" name="rsnofot">
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
@endif

@endsection