<?php $__env->startSection('contentAdd'); ?>
		<section id="content">
			<div class="container">
			  <div class="row">
				<div class="col-md-82">
				  <h2>Homepage</h2>
				  <h4>The Right Place to Request Something</h4>
				  <br>
				  	<div class="containerDashboard">
						<div class="col-homepage-left">
							<div class="well2">
								<button class="buttonHomepage">
									<div class="createReimburse">
										<img src="img/selfservice2.png" style=" width:60% vertical-align:middle">
										<h4>Employee Self Service</h4>
									</div>
								</button>
							</div>
							
						</div>
						<div class="col-homepage-center">
							<div class="well2">
								<button class="buttonHomepage">
									<div class="createReimburse">
										<img src="img/scheduler2.png" style=" width:60% vertical-align:middle"> 
										<p>Shared Facilities Scheduler</p>
									</div>
								</button>
							</div>
						</div>
						<div class="col-homepage-right">
							<div class="well2">
								<button class="buttonHomepage">
									<div class="createReimburse">
										<img src="img/observice2.png" style=" width:60% vertical-align:middle"> 
										<h4>Office Boy Service</h4>
									</div>
								</button>
							</div>
						</div>
					</div>
					<div id="conDashboard2" class="containerDashboard2">
						<div class="col-homepage-left">
							<div class="well">
								<li> <div class="createReimburse">
									<a href=""><img src="img/selfservice2.png" style=" width:60% vertical-align:middle"> </a>
									<h4>Reimburse</h4>
								</div> </li>
							</div>
						</div>
						<div class="col-homepage-center">
							<div class="well">
								<div class="createPaidLeave">
									<a href=""><img src="img/scheduler2.png" style=" width:60% vertical-align:middle"> 
									<h4>Paid Leave</h4>
								</div>
							</div>
						</div>
						<div class="col-homepage-right">
							<div class="well">
								<div class="createOvertime">
									<img src="img/observice2.png" style=" width:60% vertical-align:middle"> 
									<h4>Overtime</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			  </div>
			</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.sidebarHomepage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>