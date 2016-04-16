@extends('user.sidebarAdmin')

@section('contentAdmin')
<div class="breadcrumb">
  	<ul>
  <li><a href="#">Dashboard Admin</a></li>
  <li><a href="#">View My Log</a></li>
  <li><a href="#">Employee Self Service</a></li>
  <li><a href="#" class="active">Overtime</a></li>
  <button type="button" class="btn btn-secondary2">Back Home</button>
	</ul>
</div>
<div id="color"><p id="move">Dashboard<br>
	Description : Melihat Log Overtime</p></div>
		<section id="content">
			<div class="container">
				<div class="titleContent">
				  <h2>Overtime Data Log</h2>
				  <h4>List of Overtime Request</h4>
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
					  	@foreach($ot as $e)
							Kode : {{$e->kodeSS}}<br/>
							Employee ID: {{$e->employee_id}}<br/>
							Name : {{$e->name}}<br/>
							
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