<?php $__env->startSection('content'); ?>
        <!-- Sidebar -->
        <div class="nav-side-menu">
			<div class="brand"><a href="<?php echo e(url('/homepageGAIS')); ?>">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> <a href="#">Dashboard <b> Supervisor </b>
						  </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/selfservice.png"> Employee Self Service <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							<li><a href="<?php echo e(url('/createReimbursement')); ?>">Reimburse</a></li>		
							<li><a href="<?php echo e(url('/createPaidLeave')); ?>">Paid Leave</a></li>
							<li><a href="<?php echo e(url('/createOvertime')); ?>">Overtime</a></li>
						</ul>
						
						<li class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/scheduler.png"> Shared Facilities</a>
						</li>
						<li class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/observice.png"> Office Boy Service</a>
						</li> 
			 </div>
		</div>    
        <!-- /#sidebar-wrapper -->
		
		<?php echo $__env->yieldContent('contentAdd'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>