@extends('user.sidebarHomepage')

@section('contentAdd')
<script type="text/javascript" src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".isi").click(function() {
            var tanggal = $(this).attr('tanggal');
            var waktu = $(this).attr('waktu');

            window.location = "{{url('/formPeminjaman/')}}/"+tanggal+"/"+waktu;
        });
    });
</script>

<?php
   function isi($tanggal, $waktu) {
        $(document).ready(function() {
        $(".isi").click(function() {
            var tanggal = $(this).attr('tanggal');
            var waktu = $(this).attr('waktu');

            window.location = "{{url('/formPeminjaman/')}}/"+tanggal+"/"+waktu;
        });
    });
   } 
?>


<section id="content">
    <div class="breadcrumb">
                <ul class="isiBreadcrumb">
                    <input type="image" class="btnDashboard" src="{{url('img/symbol.png')}}">
                        <ul class="isiBreadcrumb2">
                            <li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
                            <li><a href="#" class="active">Create Shared Facilities Scheduler</a></li>
                        </ul>
                    <a href="{{url('/homepageGAIS')}}" class="btn btn-secondary2">Back to Home</a>
                </ul>
            </div>
    <div id="color">
        <p id="move">Create Shared Facilities Request</p>
        <p id="move2">Request for {{$value}}</p>
    </div>
    <br>
        <section id="content">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  @if(isset($messages))
                  <?php
                    $temp = JSON_decode($messages);
                  ?>
                  @endif

                  <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Time</th>
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
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row">09:00</th>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t1}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t1)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                        $tanggal = $t1;
                                        $waktu = "09:00";
                                    ?>
                                    @if($isi!='')
                                        <?php isi($tanggal, $waktu); ?>
                                    @endif
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t2}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t2)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                    ?>
                                    @if($isi!='')
                                        <style> 
                                            .isi[tanggal = "<?php echo $t2; ?>" ].isi[waktu = "09:00"]{
                                                background-color: #084FAD;
                                            }
                                            .isi[tanggal = "<?php echo $t2; ?>" ].isi[waktu = "09:00"]:hover{
                                                background-color: #084FAD;
                                                opacity: 50%;
                                            }
                                        </style>
                                        <p>BOOKED</p> 
                                        <script>
                                            $(document).ready(function() {
                                                $(".isi[tanggal = "<?php echo $t2; ?>" ].isi[waktu = "09:00"]").click(function() {
                                                    var tanggal = $(this).attr('tanggal');
                                                    var waktu = $(this).attr('waktu');

                                                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                                                });
                                            });
                                        </script>   
                                    @endif
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t4}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t3)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                    ?>
                                    @if($isi!='')
                                        <style> 
                                            .isi[tanggal = "<?php echo $t3; ?>" ].isi[waktu = "09:00"]{
                                                background-color: #084FAD;
                                            }
                                            .isi[tanggal = "<?php echo $t3; ?>" ].isi[waktu = "09:00"]:hover{
                                                background-color: #084FAD;
                                                opacity: 50%;
                                            }
                                        </style> 
                                        <p>BOOKED</p>
                                        <script>
                                            $(document).ready(function() {
                                                $(".isi[tanggal = "<?php echo $t3; ?>" ].isi[waktu = "09:00"]").click(function() {
                                                    var tanggal = $(this).attr('tanggal');
                                                    var waktu = $(this).attr('waktu');

                                                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                                                });
                                            });
                                        </script>   
                                    @endif
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t4}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t4)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                    ?>
                                    @if($isi!='')
                                        <style> 
                                            .isi[tanggal = "<?php echo $t4; ?>" ].isi[waktu = "09:00"]{
                                                background-color: #084FAD;
                                            }
                                            .isi[tanggal = "<?php echo $t4; ?>" ].isi[waktu = "09:00"]:hover{
                                                background-color: #084FAD;
                                                opacity: 50%;
                                            }
                                        </style>
                                        <p>BOOKED</p> 
                                        <script>
                                            $(document).ready(function() {
                                                $(".isi[tanggal = "<?php echo $t4; ?>" ].isi[waktu = "09:00"]").click(function() {
                                                    var tanggal = $(this).attr('tanggal');
                                                    var waktu = $(this).attr('waktu');

                                                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                                                });
                                            });
                                        </script>   
                                    @endif
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t5}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t5)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                    ?>
                                    @if($isi!='')
                                        <style> 
                                            .isi[tanggal = "<?php echo $t5; ?>" ].isi[waktu = "09:00"]{
                                                background-color: #084FAD;
                                            }
                                            .isi[tanggal = "<?php echo $t5; ?>" ].isi[waktu = "09:00"]:hover{
                                                background-color: #084FAD;
                                                opacity: 50%;
                                            }
                                        </style> 
                                        <p>BOOKED</p>
                                        <script>
                                            $(document).ready(function() {
                                                $(".isi[tanggal = "<?php echo $t5; ?>" ].isi[waktu = "09:00"]").click(function() {
                                                    var tanggal = $(this).attr('tanggal');
                                                    var waktu = $(this).attr('waktu');

                                                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                                                });
                                            });
                                        </script>   
                                    @endif
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t6}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t6)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                    ?>
                                    @if($isi!='')
                                        <style> 
                                            .isi[tanggal = "<?php echo $t6; ?>" ].isi[waktu = "09:00"]{
                                                background-color: #084FAD;
                                            }
                                            .isi[tanggal = "<?php echo $t6; ?>" ].isi[waktu = "09:00"]:hover{
                                                background-color: #084FAD;
                                                opacity: 50%;
                                            }
                                        </style> 
                                        <p>BOOKED</p>
                                        <script>
                                            $(document).ready(function() {
                                                $(".isi[tanggal = "<?php echo $t6; ?>" ].isi[waktu = "09:00"]").click(function() {
                                                    var tanggal = $(this).attr('tanggal');
                                                    var waktu = $(this).attr('waktu');

                                                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                                                });
                                            });
                                        </script>   
                                    @endif
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t7}}" waktu="09:00">
                                    <?php
                                        $isi = \App\Peminjaman::where('used_date', '=', date("Y-m-d", strtotime($t7)))
                                                                ->where('time_start', '=', '09:00')
                                                                ->where('status',0)
                                                                ->first();
                                    ?>
                                    @if($isi!='')
                                        <style> 
                                            .isi[tanggal = "<?php echo $t7; ?>" ].isi[waktu = "09:00"]{
                                                background-color: #084FAD;
                                            }
                                            .isi[tanggal = "<?php echo $t7; ?>" ].isi[waktu = "09:00"]:hover{
                                                background-color: #084FAD;
                                                opacity: 50%;
                                            }
                                        </style> 
                                        <p>BOOKED</p>
                                        <script>
                                            $(document).ready(function() {
                                                $(".isi[tanggal = "<?php echo $t7; ?>" ].isi[waktu = "09:00"]").click(function() {
                                                    var tanggal = $(this).attr('tanggal');
                                                    var waktu = $(this).attr('waktu');

                                                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                                                });
                                            });
                                        </script>   
                                    @endif
                                </td>
                                
                            </tr>

                            <tr>
                                <th scope="row">10:00</th>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t1}}" waktu="10:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t2}}" waktu="10:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t3}}" waktu="10:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t4}}" waktu="10:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t5}}" waktu="10:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t6}}" waktu="10:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t7}}" waktu="10:00">
                                    
                                </td>
                                
                            </tr>

                            <tr>
                                <th scope="row">11:00</th>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t1}}" waktu="11:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t2}}" waktu="11:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t3}}" waktu="11:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t4}}" waktu="11:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t5}}" waktu="11:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t6}}" waktu="11:00">
                                    
                                </td>
                                <td class="isi btn2 btn-secondary3" tanggal="{{$t7}}" waktu="11:00">
                                    
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
