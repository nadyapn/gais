@extends('user.sidebarNonAdmin')
@section('contentNonAdmin')
<div id="page-wrapper">
	<div class="row">
			<!--BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
				<li class="active">Dashboard Non Admin</li>
			</ol>
			<!-- /.col-lg-6 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
					<!--HEADER -->
					<div class="page-header2">
							<h2>Dashboard Non Admin</h2>
							<h4>Quick Overview of Your Activities</h4>
					</div>
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
	<div class="panel-body" style="margin-left:5px; margin-top:-10px; color:#333">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs">
		    <li class="active"><a href="#home" data-toggle="tab">Your History</a>
		    </li>
		    <li><a href="#profile" data-toggle="tab">Employee's Request</a>
		    </li>
		  </ul>
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div class="tab-pane fade in active" id="home">
		      <!-- Table for My History -->
		      <div style="margin-top:15px; margin-left:0.5px" class="table-responsive">
		        <table class="table table-striped table-bordered table-hover" id="dataTable">
		          <thead>
		            <tr>
		              <th>Requested ID</th>
		              <th>Type</th>
		              <th>Requested Date</th>
		              <th>View Details</th>
		              <th>Update</th>
		              <th>Delete</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($all as $f)
		            <tr>
		              <th scope="row">{{$f->kodeSS}}</th>
		              <td>{{$f->tipe}}</td>
		              <td>{{$f->request_date}}</td>
		              <td><a href="{{url('/getDetail/'.$f->kodeSS)}}" class="btn btn-view">View</a></td>
		              @if (\Auth::user()->position === 'Team Leader')
		              <td>@if ($f->status == 1)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
		              <td>@if ($f->status == 1)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
		              @elseif (\Auth::user()->id_employee === '1' || \Auth::user()->id_employee === '2')
		              <td>@if ($f->status == 2)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
		              <td>@if ($f->status == 2)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
		              @else
		              <td>@if ($f->status == 0)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
		              <td>@if ($f->status == 0)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
		              @endif
		            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
		    </div>
		    <div class="tab-pane fade" id="profile">
		      <!-- Table for Employee's Request -->
		      <div style="margin-top:15px; margin-left:0.5px" class="table-responsive">
		        <table class="table table-striped table-bordered table-hover" id="dataTable">
		          <thead>
		            <tr>
		              <th>Requested ID</th>
		              <th>Type</th>
		              <th>Requested Date</th>
		              <th>View Details</th>
						<th>Update</th>
						<th>Delete</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($ss as $g)
		            <tr>
		              <td>{{$g->kodeSS}}</td>
		              <td>{{$g->tipe}}</td>
		              <td>{{$g->request_date}}</td>
									<td><a href="{{url('/getDetail/'.$g->kodeSS)}}" class="btn btn-view">View</a></td>
							  	@if (\Auth::user()->position === 'Team Leader')
							  		<td>@if ($g->status == 1)<a href="{{url('/update/'.$g->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
										<td>@if ($g->status == 1)<a href="{{url('/delete/'.$g->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
									@elseif (\Auth::user()->posisition === 'Business Unit' || \Auth::user()->position === 'Human Resource')
									  	<td>@if ($g->status == 2)<a href="{{url('/update/'.$g->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
										<td>@if ($g->status == 2)<a href="{{url('/delete/'.$g->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
									@else
										<td>@if ($g->status == 0)<a href="{{url('/update/'.$g->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
										<td>@if ($g->status == 0)<a href="{{url('/delete/'.$g->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
									@endif
		            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
		    </div>
		  </div>
		  <!-- /.panel-body -->
		</div>
</div>
@endsection
