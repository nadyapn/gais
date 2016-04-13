	@foreach($ss as $e)
		Kode : {{$e->kodeSS}}<br/>
		

		Request Date : {{$e->request_date}}<br/>

		Type : {{$e->tipe}}<br/>

		@if($e->status == 0) 
			Status : Not approved yet by Supervisor 
		@elseif ($e->status == 1 )	
			Status : Approved by Supervisor
		@elseif ($e->status == 2)
			@if($e->tipe === 'PaidLeave')
				Status : Approved by HR
			@else 
				Status : Approved by Business Unit
			@endif
		@elseif ($e->status == -1)
			Status : Deleted by Employee
		@endif<br/>
 
	@endforeach