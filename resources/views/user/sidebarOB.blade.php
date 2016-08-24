@extends('layouts.master')

@section('contentSidebar')
    <div class="row">
        <div class="col-md-2">
 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="gaisBrandDashboard">
                            <a style="font-size:2em; text-align:center" href="#"><i></i> GAIS</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard <b> {{\Auth::user()->position}} </b></a>
                        </li>
                        <li>
                          <a href="{{url('/getTaskOBServices')}}">
                          <img style="margin-left:10px;margin-right:5px"src="{{asset('img/taskob.png')}}"> My Task </b>
                          </a>
                        </li>
                        <li>
                          <a href="{{url('/getAllTask')}}">
                          <img style="margin-left:10px;margin-right:5px"src="{{asset('img/logob.png')}}"> My Log </b>
                          </a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </div>

        <div class="col-md-10">
@yield('contentOB')
        </div>
    </div>
      

            

@endsection


