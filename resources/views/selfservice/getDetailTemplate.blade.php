@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Details</h2>
				  <h4>View Your Details</h4>
				  <br>
				  	@yield('detailContent')
				  <br/>
				</div>
			  </div>
			</div>
	</section>
@endsection