<?php $__env->startSection('contentNonAdmin'); ?>
		<section id="content">
			<div class="container">
				<div class="titleContent">
				  <h2>Overtime History</h2>
				  <h4>List of your Overtime History</h4>
				</div>
			</div>			
			<!-- /#table-->
			<div class="table-responsive">
					<table class="table">
					  <?php foreach($ot as $e): ?>
						Kode : <?php echo e($e->kodeSS); ?><br/>
						
						<?php if($e->status == 0): ?>
								Status : Not approved yet by Supervisor <br/>
						<?php elseif($e->status == 1): ?>
								Status : Approved by Supervisor <br/>
						<?php elseif($e->status == 2): ?>
								Status : Approved by HR <br/>
						<?php elseif($e->status == 3): ?>
								Status : Approved by Business Unit <br/>
						<?php endif; ?>
				 
					<?php endforeach; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.sidebarNonAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>