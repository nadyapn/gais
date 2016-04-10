<form action="{{url('/addPaidLeave')}}" method="post">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

	Date Hired	: <input type="date" name="datehired"><br/>
	Period of Leave	: 
	<select name="periodofleave">
	  <option value="jan">January</option>
	  <option value="feb">February</option>
	  <option value="mar">March</option>
	  <option value="apr">April</option>
	  <option value="may">May</option>
	  <option value="jun">June</option>
	  <option value="jul">July</option>
	  <option value="aug">August</option>
	  <option value="sept">September</option>
	  <option value="oct">October</option>
	  <option value="nov">November</option>
	  <option value="dec">December</option>
	</select> <br/>
	Reason of Leave	: <input type="text" name="rsnofleave"><br/>
	Category	: 
	<select name="category">
	  <option value="sick">Sick</option>
	  <option value="maternity">Maternity</option>
	  <option value="other">Other</option>
	</select> <br/>

	<br/>
	<input type="submit" value="Submit"/>
</form>