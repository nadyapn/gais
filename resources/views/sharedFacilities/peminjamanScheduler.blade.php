@extends('user.sidebarHomepage')
@section('contentSidebarHomepage')
<!-- Script Collection -->
<script type="text/javascript" src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
<script>
  $(document).ready(function() {
      $('.isi').click(function() {
          var tanggal = $(this).attr('tanggal');
          var waktu = $(this).attr('waktu');                        

          if($(this).html().trim() == "") {
            window.location = "{{url('/formPeminjaman/')}}/"+tanggal+"/"+waktu;
          }
      });
  });
</script>
<!-- End of Script Collection -->


<div id="page-wrapper">
    <div class="row">
            <!--BREADCRUMB -->
            <ol class="breadcrumb">
        <li><a href="{{url('/homepageGAIS')}}">Homepage</a></li>
                <li><a class="active">Create Shared Facilities Scheduler</a></li>
            </ol>
            <!-- /.col-lg-6 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
          <!--HEADER -->
          <div class="page-header2">
            <h2><b>{{$value}} </b>Scheduler Request Form</h2>
            <h4>Choose The Schedule on the empty box</h4>
          </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      @if(isset($messages))
          <?php
            $temp = JSON_decode($messages);
          ?>
      @endif
      <div style="margin-left:15px" class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <?php
        $times = array("09:00", "10:00", "11:00","12:00", "13:00", "14:00","15:00", "16:00", "17:00","18:00"); 
        $d1 = date("Y-m-d");
        $d2 = date("Y-m-d", strtotime("tomorrow"));
        $d3 = date("Y-m-d", strtotime("+1 days", strtotime("tomorrow")));
        $d4 = date("Y-m-d", strtotime("+2 days", strtotime("tomorrow")));
        $d5 = date("Y-m-d", strtotime("+3 days", strtotime("tomorrow")));
        $d6 = date("Y-m-d", strtotime("+4 days", strtotime("tomorrow")));
        $d7 = date("Y-m-d", strtotime("+5 days", strtotime("tomorrow")));

        $dates = array($d1, $d2, $d3, $d4, $d5, $d6, $d7);
        ?>
        <thead style="font-weight:bold">
          <tr>
          <th scope="row">Time</th>
          @foreach($dates as $date)
            <td>{{$date}}</td>
          @endforeach
          </tr>
        </thead>
        <tbody>
        @foreach($times as $time)
        <tr>
          <th scope="row">{{$time}}</th>
          @foreach($dates as $date)
          <td class="isi btn2 btn-secondary3" tanggal="{{$date}}" waktu="{{$time}}">
            <?php $isi = \App\Peminjaman::getThisPeminjaman($date, $time, $value);
                  $isi2 = \App\Peminjaman::getPeminjamanByMe($date, $time, $value);
            ?>
            @if ($isi > 0) 
              <style>
                .isi[tanggal = "<?php echo $date; ?>" ].isi[waktu = "<?php echo $time; ?>"]{
                    background-color: #084FAD;
                    @if($isi2 > 0) background-color: #cccccc; @endif
                }
                .isi[tanggal = "<?php echo $date; ?>" ].isi[waktu = "<?php echo $time; ?>"]:hover{
                    background-color: #084FAD;
                    @if($isi2 > 0) background-color: #cccccc; @endif
                    color:white;
                    opacity: 50%;
                }
              </style>
              <p>BOOKED</p>
              <script>
              $(document).ready(function() {
                $('.isi[tanggal = "<?php echo $date; ?>" ].isi[waktu = "<?php echo $time; ?>"]').click(function() {
                  var tanggal = $(this).attr('tanggal');
                  var waktu = $(this).attr('waktu');                        

                  @if($isi2 == 0)
                    window.location = "{{url('/formWaitingList/')}}/"+tanggal+"/"+waktu;
                  @else
                    alert("You have booked this facility");
                  @endif
                });
              });
              </script>
            @endif
          </td>
          @endforeach
        </tr>
        @endforeach

      </tbody>
      
      </table>
    </div>
    </div>
    </div>
</div>

@endsection
