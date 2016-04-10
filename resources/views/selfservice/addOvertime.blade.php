<form action="{{url('/addOvertime')}}" method="post">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

	Date of Overtime	: <input type="date" name="dateot"><br/>
	Time Starts	: <input type="time" name="timestarts"><br/>
	Time Ends	: <input type="time" name="timeends"><br/>
	Reason of Overtime	: <input type="text" name="rsnofot"><br/>

	<br/>
	<input type="submit" value="Submit"/>
</form>