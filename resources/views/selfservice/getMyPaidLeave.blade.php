@extends('user.sidebarNonAdmin')

@section('contentNonAdmin')
	<div class="breadcrumb">
		<ul class="isiBreadcrumb">
			<input type="image" class="btnDashboard" src="img/symbol.png">
				<ul class="isiBreadcrumb2">
				<li><a href="#">Homepage</a></li>
				<li><a href="#">Dashboard Non Admin</a></li>
				<li><a href="#" class="active">Paid Leave History</a></li>
			</ul>
			<button type="button" class="btn btn-secondary2">Back to Home</button>
		</ul>
	</div>
	<div id="color">
		<p id="move">Dashboard</p>
		<p id="move2">A detailed look of your Paid Leave history</p>
	</div>
		<section id="content">
			<div class="container">
				<div class="titleContent">
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
					  @foreach($pl as $e)
						Kode : {{$e->kodeSS}}<br/>
						
						@if ($e->status == 0)
								Status : Not approved yet by Supervisor <br/>
						@elseif ($e->status == 1)
								Status : Approved by Supervisor <br/>
						@elseif ($e->status == 2)
								Status : Approved by HR <br/>
						@elseif ($e->status == 3)
								Status : Approved by Business Unit <br/>
						@endif
				 
					@endforeach
					</table>
			</div>
			<div class="paginationNumber">
					<ul class="pagination">
					  <li>
						<a href="#" aria-label="Previous">
						  <span aria-hidden="true">
							<i class="fa fa-caret-left"></i>
						  </span>
						</a>
					  </li>
					  <li class="active"><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li>
						<a href="#" aria-label="Next">
						  <span aria-hidden="true">
							<i class="fa fa-caret-right"></i>
						  </span>
						</a>
					  </li>
					</ul>
				</div>
		</section>
@endsection