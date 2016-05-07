<html>

	<head>	
		<style>	
			td{
				 border:1px solid #000000;
				 padding-left:30px;
				 padding-right:30px;
			}
			.isi:hover{
				background-color: green;
			}
		</style>
	</head>

	<body>
		<table>
			<tr>
				<td>
					
				</td>
				<td>
					<?php $t1 = date("d-m-Y"); ?>
					{{$t1}}
				</td>
				<td>
					<?php $d=strtotime("tomorrow"); $t2 = date("d-m-Y", $d); ?>
					{{$t2}}
				</td>
				<td>
					<?php $d=strtotime("tomorrow");$d=strtotime("+1 days", $d); $t3 = date("d-m-Y", $d); ?>
					{{$t3}}
				</td>
				<td>
					<?php $d=strtotime("tomorrow");$d=strtotime("+2 days", $d); $t4 = date("d-m-Y", $d); ?>
					{{$t4}}
				</td>
				<td>
					<?php $d=strtotime("tomorrow");$d=strtotime("+3 days", $d); $t5 = date("d-m-Y", $d); ?>
					{{$t5}}
				</td>
				<td>
					<?php $d=strtotime("tomorrow");$d=strtotime("+4 days", $d); $t6 = date("d-m-Y", $d); ?>
					{{$t6}}
				</td>
				<td>
					<?php $d=strtotime("tomorrow");$d=strtotime("+5 days", $d); $t7 = date("d-m-Y", $d); ?>
					{{$t7}}
				</td>
			</tr>

			<tr>
				<td>
					9AM
				</td>
				<td class="isi" tanggal="{{$t1}}" waktu="9am">
					<?php
						$isi = \App\Jadwal::where('tanggal', '=', $t1)->where('waktu', '=', '9am')->first();
					?>
					@if($isi!='')
						{{$isi->keperluan}}
					@endif
				</td>
				<td class="isi" tanggal="{{$t2}}" waktu="9am">
					
				</td>
				<td class="isi" tanggal="{{$t3}}" waktu="9am">
					
				</td>
				<td class="isi" tanggal="{{$t4}}" waktu="9am">
					
				</td>
				<td class="isi" tanggal="{{$t5}}" waktu="9am">
					
				</td>
				<td class="isi" tanggal="{{$t6}}" waktu="9am">
					
				</td>
				<td class="isi" tanggal="{{$t7}}" waktu="9am">
					
				</td>
				
			</tr>

			<tr>
				<td>
					10AM
				</td>
				<td class="isi" tanggal="{{$t1}}" waktu="10am">
					
				</td>
				<td class="isi" tanggal="{{$t2}}" waktu="10am">
					
				</td>
				<td class="isi" tanggal="{{$t3}}" waktu="10am">
					
				</td>
				<td class="isi" tanggal="{{$t4}}" waktu="10am">
					
				</td>
				<td class="isi" tanggal="{{$t5}}" waktu="10am">
					
				</td>
				<td class="isi" tanggal="{{$t6}}" waktu="10am">
					
				</td>
				<td class="isi" tanggal="{{$t7}}" waktu="10am">
					
				</td>
				
			</tr>

			<tr>
				<td>
					11AM
				</td>
				<td class="isi" tanggal="{{$t1}}" waktu="11am">
					
				</td>
				<td class="isi" tanggal="{{$t2}}" waktu="11am">
					
				</td>
				<td class="isi" tanggal="{{$t3}}" waktu="11am">
					
				</td>
				<td class="isi" tanggal="{{$t4}}" waktu="11am">
					
				</td>
				<td class="isi" tanggal="{{$t5}}" waktu="11am">
					
				</td>
				<td class="isi" tanggal="{{$t6}}" waktu="11am">
					
				</td>
				<td class="isi" tanggal="{{$t7}}" waktu="11am">
					
				</td>
				
			</tr>
		</table>

		<script type="text/javascript" src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
		<script>
			$(document).ready(function() {
				$(".isi").click(function() {
					var tanggal = $(this).attr('tanggal');
					var waktu = $(this).attr('waktu');

					window.location = "{{url('/contoh/')}}/"+tanggal+"/"+waktu;
				});
			});
		</script>

	</body>
</html>