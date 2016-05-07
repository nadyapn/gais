<form action="{{url('addContoh/'.$tanggal.'/'.$waktu)}}" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	
	<input type="submit">
</form>