	@foreach($pl as $e)
		Kode : {{$e->kodeSS}}<br/>
		
		@if($e->status == 0) 
			Status : Not approved yet by Supervisor 
		@elseif ($e->status == 1 )	
			Status : Approved by Supervisor
		@elseif ($e->status == 2)
			Status : Approved by HR
		@elseif ($e->status == -1)
			Status : Deleted by Employee
		@endif<br/>

		Request Date : {{$e->request_date}}<br/>
 
	@endforeach