	@foreach($pl as $e)
		Kode : {{$e->kodeSS}}<br/>
		
		@if ($e->status == 0)
			Status : Not approved yet by Supervisor <br/>
		@else 
			Status : Approved by Supervisor <br/>
		@endif
 
	@endforeach