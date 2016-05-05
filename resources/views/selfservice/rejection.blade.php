@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="{{asset('img/symbol.png')}}">
						<ul class="isiBreadcrumb2">
							
							<li><a href="#" class="active">Rejection
							</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
		<div id="color">
			<p id="move">Rejection</p>
			<p id="move2">Leave your message here</p>
		</div>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  	<form action="{{url('/rejection/'.$ss->kodeSS)}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						  <div class="form-group">
						  	@if(isset($temp->message[0])){{required}}@endif<br/>
							<h4>Why do you reject this request?</h4>
							<br>
							<input type="textarea" class="form-control" placeholder="Explain here" name="message">
						  </div>
						  <div class="form-group">
							<input type="submit" value="Submit" class="btn btn-secondary"></input>
						  </div>
						</div>					
					 </form>
				  	
				  <!-- Button trigger modal -->
				</div>
			  </div>
			</div>
	</section>

	@endsection



