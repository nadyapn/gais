@extends('user.sidebarAdmin')
@section('contentAdmin')
		<section id="content">
			<div class="container">
				<div class="titleContent">
				  <h2>Reimburse Data Log</h2>
				  <h4>List of Reimburse Request</h4>
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table" id="dataTable">
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>Type</th>
						  <th>Request Date</th>
						  <th>Employee Name</th>
						  <th>Project Info</th>
						  <th>Necessity</th>
						  <th>Status</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">1</th>
						  <td>Reimburse</td>
						  <td>24/5/2010</td>
						  <td>John Doe</td>
						   <td>Project A</td>
						  <td>Travelling</td>
						  <td><button class="btn btn-delete">Canceled</button></td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>Reimburse</td>
						  <td>24/5/2010</td>
						  <td>Dian Sas</td>
						  <td>Project A</td>
						  <td>Copying Document B</td>
						  <td><button class="btn btn-view">Completed</button></td>
						</tr>
						<tr>
						  <th scope="row">3</th>
						  <td>Reimburse</td>
						  <td>24/5/2010</td>
						  <td>Pevita</td>
						  <td>Project A</td>
						  <td>Shopping</td>
						  <td><button class="btn btn-view">Completed</button></td>
						</tr>
						<tr>
						  <th scope="row">4</th>
						  <td>Reimburse</td>
						  <td>14/6/2010</td>
						  <td>Mark Webb</td>
						  <td>Project A</td>
						  <td>Shopping</td>
						  <td><button class="btn btn-update">Not Completed</button></td>
						</tr>
						<tr>
						  <th scope="row">5</th>
						  <td>Reimburse</td>
						  <td>14/6/2014</td>
						  <td>Jessica</td>
						  <td>Project B</td>
						  <td>Administration Cost</td>
						  <td><button class="btn btn-update">Not Completed</button></td>
						</tr>
					  </tbody>
					</table>
			</div>
		</section>
@endsection