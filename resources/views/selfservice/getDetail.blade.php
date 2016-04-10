
	@if ($rm != "")
		@if($rm->photo != "")  @endif
		KodeSS : {{$ss->kodeSS}}<br/>
		Business Purpose : {{$rm->business_purpose}}<br/>
		Category : {{$rm->category}}<br/>
		Event Date : {{$rm->date}}<br/>
		Detail of Spending : {{$ss->description}}<br/>
		Total Cost : {{$rm->cost}}<br/>
		Photo : <img src="{{url('./foto/'.$rm->photo)}}" style="width:500px;"/><br/>
		
		@if($rm->status == 0) 
			Status : Not approved yet by Supervisor 
		@else	
			Status : Approved by Supervisor
		@endif<br/>

		Request Date : {{$ss->request_date}}<br/>

		<br/>
	@elseif ($pl != "")
		KodeSS : {{$ss->kodeSS}}<br/>
		Date Hired : {{$pl->date_hired}}<br/>
		Period of Leave : {{$pl->period_of_leave}}<br/>
		Total Leave : {{$pl->total_leave}}<br/>
		Reason of Leave : {{$ss->description}}<br/>
		Category : {{$pl->category}}<br/>

		@if($pl->status == 0) 
			Status : Not approved yet by Supervisor 
		@else	
			Status : Approved by Supervisor
		@endif

		Request Date : {{$ss->request_date}}<br/>
	@elseif ($ot != "")
		KodeSS : {{$ss->kodeSS}}<br/>
		Date of Overtime : {{$ot->date}}<br/>
		Time Starts : {{$ot->time_start}}<br/>
		Time Ends : {{$ot->time_end}}<br/>
		Reason of Overtime : {{$ss->description}}<br/>

		@if($ot->status == 0) 
			Status : Not approved yet by Supervisor 
		@else	
			Status : Approved by Supervisor
		@endif<br/>

		Request Date : {{$ss->request_date}}<br/>
	@else
		not found
	@endif


