

		@if($rm->photo != "")  @endif
		KodeSS : {{$ss->kodeSS}}<br/>
		Business Purpose : {{$rm->business_purpose}}<br/>
		Category : {{$rm->category}}<br/>
		Tanggal Acara : {{$rm->date}}<br/>
		Descripsi Pengeluaran : {{$ss->description}}<br/>
		Total Cost : {{$rm->cost}}<br/>
		Photo : <img src="{{url('./foto/'.$rm->photo)}}" style="width:200px;"/><br/>
		
		@if($rm->status == 0) 
			Status : Belum Disetujui Supervisor 
		@else	
			Status : Sudah disetujui
		@endif<br/>

		Request Date : {{$ss->request_date}}<br/>

		<br/>


