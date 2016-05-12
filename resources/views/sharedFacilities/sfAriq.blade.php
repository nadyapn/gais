@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="#" class="active">Create Shared Facilities Scheduler</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
		</div>
	<div id="color">
		<p id="move">Create Shared Facilities Scheduler Request</p>
		<p id="move2"></p>
	</div>

	<div id="color2">
		<!-- muncul setelah NgeGET dari Selected Room-->
		<p id="move7">Selected Room</p>
		<p id="pIDResultRoom" class="move8">Room 2</p>
	</div>
	<br>
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  @if(isset($messages))
				  <?php
				  	$temp = JSON_decode($messages);
				  ?>
				  @endif

				  <form id="formRoom">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-inline">
						   <div class="form-group">
								 <h3>Choose Your Room Here</h3>
									<select id="idSelectRoom" class="form-control" name="chooseRoom" >
										<option selected disabled>chooseRoom</option>
										<option value="room1">Room 1</option>
										<option value="room2">Room 2</option>
									</select>
						   </div>
						  <div class="form-group">
								<a onclick="div_show2()" class="btn btn-secondary">Submit</a>
						  </div>
						</div>
					</form>
				</div>
			  </div>
			</div>


			<!-- /#table-->
			<div class="table-responsive">
				<body onload="date()">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Time</th>
							<th id="Mon"></th>
							<th id="Tues"></th>
							<th id="Wed"></th>
							<th id="Thu"></th>
							<th id="Fri"></th>
							<th id="Sat"></th>
							<th id="Sun"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">08.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">09.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">10.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">11.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">12.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">13.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">14.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">15.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">16.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
						<tr>
							<th scope="row">17.00</th>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>
							<td><input id="popup" type="submit" value="BOOK" onclick="div_show()" class="btn2 btn-secondary3"></td>

						</tr>
					</tbody>
					</table>

					<!-- Ini button utk post ke database -->
					<div class="container">
						<div class="row">
						<div class="col-md-8" >
							<div class="form-group">
								<input type="submit" value="BOOK YOUR ROOM" class="btn btn-secondary4"></input>
							</div>
						</div>
						</div>
					</div>

					<!-- div untuk Popup Formnya -->
					<div class="container">
						<div class="row">
						<div id="divPopup" class="col-md-8" >
						<form id="formPopup" action="#" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-inline">
								 <div class="form-group">
									 <img id="closePopup" src="{{asset('/img/exit.png')}}" onclick ="div_hide()">
									 <h3>Book Your Room Here</h3>

								 </div>
								<div class="form-group">
									<input id="popupDesc" type="text" class="form-control" placeholder="Description" name="SFDescription">
								</div>
								<div class="form-group">
									<input type="submit" id="submitForm" value="Submit" class="btn btn-secondary"></input>
								</div>
							</div>
						</form>
					</div>
					</div>
				</div>
	</section>
@endsection
