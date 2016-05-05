@extends('layouts.master')


@section('content')
<html>
	<head>
		<!-- Custom CSS -->
		<link href="css/simple-sidebar.css" rel="stylesheet">
	</head>
	<body>
		<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h1>Log-in GAIS</h1>
				  @if(isset($msg))
				  	<h6>Wrong email or password</h6>
				  @endif
				  <form action="{{url('/login')}}" method="post">
				  <div class="form-inline2">
						<div class="form-group">	
					  	<input type="hidden" class="form-control" name="_token" value="<?php echo csrf_token(); ?>">
					  </div>
					  <div class="form-group">
						<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email" name="email">
					  </div>
					  <div class="form-group">
						<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Enter Password" name="password">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Login" class="btn btn-secondary"></input>
					  </div>
					</div>
					<div class="form-group">
					  General Affairs Information System
					</div>
					<div class="form-group">
					  <button type="submit" class="btn btn-danger">Login via Google Account</button>
					</div>
				  </form>
				  </div>
				</div>
			  </div>
			</div>
		</section>
	    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	
	</body>
</html>
@endsection