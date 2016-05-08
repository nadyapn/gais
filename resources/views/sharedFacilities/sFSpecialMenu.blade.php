@extends('user.sidebarAdmin')

@section('contentAdmin')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<a  class="btnDashboard"> </a>
						<ul class="isiBreadcrumb2">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#" class="active"></a></li>
						</ul>
				</ul>
			</div>
	<div id="color">
		<p id="move">Welcome to Shared Facilities Special Menu, <b>{{\Auth::user()->name}}</b>!</p>
	</div>
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <br>
				  	<div class="containerDashboard">
							<div class="col-homepage-left">
									<div class="createDashboard">
										<img src="{{asset('img/create.png')}}" style=" width:60% vertical-align:middle"><br><br>
										<a href="{{url('/createFacility')}}" class="buttonHomepage btn btn-secondary2">Create New Facility</a>
									</div>
							</div>
							<div class="col-homepage-left">
									<div class="createDashboard">
										<img src="{{asset('img/delete.png')}}" style=" width:60% vertical-align:middle"><br><br>
										<a href="{{url('/deleteFacility')}}" class="buttonHomepage btn btn-secondary2">Delete Facility</a>
									</div>
							</div>
					</div>
					<br>
				</div>
			  </div>
			</div>
	</section>
@endsection
