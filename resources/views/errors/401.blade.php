@extends('layouts.master')
@section('content')
<div id="page-wrapper3" style="margin:0px 0 0 0px;">
<div class="container">
  <!-- Jumbotron -->
  <div class="col-lg-12" style="margin:100px 0 0 0px;">
    <h1><i class="fa fa-frown-o fa-4x"></i> </h1>
    <h1> <b> You are not authorized </b> to access this page due to invalid authentication</h1>
    <br>
    <p>
      <a href="{{url('/homepageGAIS')}}" class="btn btn-primary btn-lg">>Take Me To The Homepage</a>
    </p>
  </div>
</div>
</div>
<div id="page-wrapper" style="margin:0px 0 0 0px;">
</div>
@endsection
