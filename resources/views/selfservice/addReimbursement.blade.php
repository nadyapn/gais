<form action="{{url('/addReimbursement')}}" method="post"  enctype="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

	Business Purpose	: <input type="text" name="businesspurpose"><br/>
	Category	: 
	<select name="category">
	  <option value="project">Project</option>
	  <option value="other">Other</option>
	</select> <br/>
	Tanggal Acara	: <input type="date" name="dateRem"><br/>
	Deskripsi Pengeluaran	: <input type="text" name="descriptionRem"><br/>
	Total Cost	: <input type="number" name="cost"><br/>
	Foto : <input type="file" name="foto" accept="image/*"><br/>

	<br/>
	<input type="submit" value="Submit"/>
</form>