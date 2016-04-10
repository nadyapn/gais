	@foreach($pl as $e)
		Kode : {{$e->kodeSS}}<br/>
		
		@if ($e->status == 0)
				Status : Not approved yet by Supervisor <br/>
		@elseif ($e->status == 1)
				Status : Approved by Supervisor <br/>
		@elseif ($e->status == 2)
				Status : Approved by HR <br/>
		@elseif ($e->status == 3)
				Status : Approved by Business Unit <br/>
		@endif
 
	@endforeach