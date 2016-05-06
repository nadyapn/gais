@extends('user.sidebarAdmin')

@section('contentAdmin')
<section id="content">
	<div class="breadcrumb">
				<ul class="isiBreadcrumb">
					<input type="image" class="btnDashboard" src="img/symbol.png">
						<ul class="isiBreadcrumb2">
							<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
							<li><a href="{{url('/sFSpecialMenu')}}">Shared Facilities Special Menu</a></li>
							<li><a href="#" class="active">Delete Facilites</a></li>
						</ul>
					<a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
				</ul>
			</div>
	<div id="color">
		<p id="move">Delete Facilities </p>
		<!-- ini contoh alert -->
		<!-- normalnya, belum muncul saat halaman baru dibuka -->
		<!-- muncul setelah menghapus salah satu fasilitas -->
		<p id="move4">Your selected facility has been deleted</p>
	</div>
	<br>
		<!-- /#table-->
		<div class="table-responsive">
				<table class="table" id="dataTable">
						<thead>
						<tr>
							<th>Room ID</th>
							<th>Room's Name</th>
							<th>Description</th>
							<th>Delete</th>
						</tr>
						</thead>
						<tbody>
							<!-- insert kode here -->
						</tbody>
				</table>
		</div>
</section>
@endsection
