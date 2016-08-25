
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
		    @if (\Auth::user()->position != 'Member')
		    <li><a href="#profile" data-toggle="tab">Employee's Request</a>
		    </li>
		    @endif
		    <li><a href="#sftab" data-toggle="tab">Shared Facilities Request</a>
		    </li>
		    <li><a href="#obtab" data-toggle="tab">OB Request</a>
		    </li>
		  </ul>
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div class="tab-pane fade active" id="home">
		      <!-- Table for My History -->
		      <div style="margin-top:15px; margin-left:0.5px" class="table-responsive">
		        <table class="display table">
		          <thead>
		            <tr>
		              <th>Requested ID</th>
		              <th>Type</th>
		              <th>Requested Date</th>
		              <th>Status</th>
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
		              <td>
		              	@if ($f->status == 0)
		              		Not approved yet by Supervisor
		              	@elseif ($f->status == 1)
		              		Approved by Supervisor
		              	@elseif ($f->status == 2)
		              		Approved by Business Unit
		              	@elseif ($f->status == -1)
		              		Canceled by Employee
		              	@elseif ($f->status == 3)
		              		Rejected by Supervisor
		              	@elseif ($f->status == 4)
		              		Rejected by Business Unit
		              	@endif
		              </td>
		              <td><a href="{{url('/getDetail/'.$f->kodeSS)}}" class="btn btn-view">View</a></td>
		              @if (\Auth::user()->position === 'Team Leader')
		              <td>@if ($f->status == 1)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
		              <td>@if ($f->status == 1)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
		              @elseif (\Auth::user()->position === 'Head of Business Unit' || \Auth::user()->position === 'Head of HR')
		              <td>@if ($f->status == 1)<a href="{{url('/update/'.$f->kodeSS)}}" class="btn btn-update">Update </a> @endif</td>
		              <td>@if ($f->status == 1)<a href="{{url('/delete/'.$f->kodeSS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
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
		    @if (\Auth::user()->position != 'Member')
		    <div class="tab-pane fade" id="profile">
		      <!-- Table for Employee's Request -->
		      <div style="margin-top:15px; margin-left:0.5px" class="table-responsive">
		        <table class="display table">
		          <thead>
		            <tr>
		              <th>Requested ID</th>
		              <th>Type</th>
		              <th>Requested Date</th>
		              <th>Status</th>
		              <th>View Details</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($ss as $g)
		            <tr>
		              <td>{{$g->kodeSS}}</td>
		              <td>{{$g->tipe}}</td>
		              <td>{{$g->request_date}}</td>
		              <td>
		              	@if ($g->status == 0)
		              		Not approved yet by Supervisor
		              	@elseif ($g->status == 1)
		              		Approved by Supervisor
		              	@elseif ($g->status == 2)
		              		Approved by Business Unit
		              	@elseif ($g->status == -1)
		              		Canceled by Employee
		              	@elseif ($g->status == 3)
		              		Rejected by Supervisor
		              	@elseif ($g->status == 4)
		              		Rejected by Business Unit
		              	@endif
		              </td>
						<td><a href="{{url('/getDetail/'.$g->kodeSS)}}" class="btn btn-view">View</a></td>	  	
		            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
		    </div>
		   @endif
		   
		  <div class="tab-pane fade" id="sftab">
		      <!-- Table for SF's Request -->
		      <div style="margin-top:15px; margin-left:0.5px" class="table-responsive">
		        <table class="display table">
		          <thead>
		            <tr>
		              <th>Facility</th>
		              <th>Requested Date</th>
		              <th>Status</th>
		              <th>View Details</th>
		              <th>Delete</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($sf as $h)
		            <tr>
		              <td>{{$h->sfname}}</td>
		              <td>{{$h->request_date}}</td>
		              <td>
		              	@if ($h->status == 0)
		              		Booked
		              	@elseif ($h->status == 1)
		              		Waiting List
		              	@endif
		              </td>
					<td><a href="{{url('/getDetailPeminjaman/'.$h->kodePinjam)}}" class="btn btn-view">View</a></td>
					<td>@if ($h->status == 0 || $h->status == 1)<a href="{{url('/deletePeminjaman/'.$h->kodePinjam)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>
							  	
		            </tr>
		            @endforeach
		            
		          </tbody>
		        </table>
		      </div>
		    </div>
		    <div class="tab-pane fade" id="obtab">
		      <!-- Table for OB's Request -->
		      <div style="margin-top:15px; margin-left:0.5px" class="table-responsive">
		        <table class="display table">
		          <thead>
		            <tr>
		              <th>Requested ID</th>
		              <th>Requested Date</th>
		              <th>Batch</th>
		              <th>Status</th>
		              <th>View Details</th>
		              <th>Update</th>
		              <th>Delete</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($ob as $i)
		            <tr>
		              <td>{{$i->kodeOBS}}</td>
		              <td>{{$i->date}}</td>
		              <td>{{$i->batch}}</td>
		              <td>
		              	@if ($i->status == 0)
		              		Not Approved by OB yet
		              	@elseif ($i->status == 1)
		              		Approved by OB
		              	@elseif ($i->status == 2)
		              		Rejected by OB
		              	@endif
		              </td>
					<td><a href="{{url('/getDetailOBS/'.$i->kodeOBS)}}" class="btn btn-view">View</a></td>
					<td>@if ($i->status == 0)<a href="{{url('/updateOBS/'.$i->kodeOBS)}}" class="btn btn-update">Update </a> @endif</td>
		              <td>@if ($i->status == 0)<a href="{{url('/deleteOBS/'.$i->kodeOBS)}}" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a> @endif</td>		  	
		            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
		    </div>
		  <!-- /.panel-body -->
		</div>
</div>
@endsection