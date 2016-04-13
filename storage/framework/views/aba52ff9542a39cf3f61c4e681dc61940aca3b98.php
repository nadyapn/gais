<?php $__env->startSection('contentAdd'); ?>
	<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-8">
				  <h2>Create Overtime Request</h2>
				  <h4>Make your Overtime Request</h4>
				  <br>
				  <form action="<?php echo e(url('/addOvertime')); ?>" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-inline">
					  <div class="form-group">
						<input type="date" class="form-control" placeholder="Enter Date of Overtime" name="dateot">
					  </div>
					  <div class="form-group">
						<input type="time" class="form-control" placeholder="Overtime time start" name="timestarts">
					  </div>
					  <div class="form-group">
						<input type="time" class="form-control" placeholder="Overtime time end" name="timeends">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Reason of Overtime" name="rsnofot">
					  </div>
					  <div class="form-group">
					    <input type="submit" value="Submit" class="btn btn-secondary"></input>
					  </div>
					</div>					
				  </form>
				</div>
			  </div>
			</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.sidebarHomepage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>