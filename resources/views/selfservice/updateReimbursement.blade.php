<form action="{{url('/updateReimbursement/'.$selfservice->kodeSS)}}" method="post"  enctype="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="form-inline">
		
		<div class="form-group">
			<input type="date" class="form-control" placeholder="Date Reimbursement" name="dateRem">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Total Cost" name="cost">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Enter Business Purpose" name="businesspurpose">
		</div>
		<select name="category">
			<option disabled>Select Category</option>
			<option value="project">Project</option>
			<option value="other">Other</option>
		</select> <br/>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Enter Description" name="descriptionRem">
		</div>
		<div class="form-group">
			<input type="file" class="form-control" title="Upload Reimburse File" name="foto" accept="image/*">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-secondary">Submit</button>
		</div>
	</div>
</form> 