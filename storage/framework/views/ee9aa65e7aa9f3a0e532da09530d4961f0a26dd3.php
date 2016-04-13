<?php $__env->startSection('content'); ?>
        <div class="nav-side-menu">
			<div class="brand"><a href="<?php echo e(url('/homepageGAIS')); ?>">GAIS</a></div>
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li class="active">
						  <a href="#">
						  <img style="margin-left:10px;margin-right:5px"src="img/dashboard.png"> Dashboard <b> Admin </b>
						  </a>
						</li>

						<li  data-toggle="collapse" data-target="#Employee-Self-Service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/log.png"> View My Log <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="Employee-Self-Service">
							<li data-toggle="collapse" data-target="#Employee-Self-Service2"><a href="#">Employee Self-Service
								<ul class="sub-menu collapse" id="Employee-Self-Service2">
									<li><a href="<?php echo e(url('/getLogReimbursement')); ?>">Reimburse</a></li>		
									<li><a href="<?php echo e(url('/getLogPaidLeave')); ?>">Paid Leave</a></li>
									<li><a href="<?php echo e(url('/getLogOvertime')); ?>">Overtime</a></li>
								</ul>
							</li>
							<li><a href="#">Shared Facilities Scheduler</li>
							<li><a href="#">Office Boy Service<i> Beta</i></li>
						</ul>
						
						<li data-toggle="collapse" data-target="#service" class="collapsed">
						  <a href="#"><img style="margin-left:10px;margin-right:5px"src="img/scheduler.png"> Shared Facilities <b>Special Menu</b></a>
						</li> 
			 </div>
		</div>    

        <!-- /#sidebar-wrapper -->
        
        <?php echo $__env->yieldContent('contentAdmin'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>