<?php $__env->startSection('content'); ?>
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
				  <form>
					<div class="form-inline">
					  <div class="form-group">
						<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
					  </div>
					  <div class="form-group">
						<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Enter Password">
					  </div>
					  <div class="form-group">
						<button type="submit" class="btn btn-secondary">Login</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>