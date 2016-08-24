<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Master">
  <meta name="author" content="Faizal Rahman">
  <meta name="edited by" content="Ariq Fikri Narasaputra">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/img/favicon/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/img/favicon/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/img/favicon/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/favicon/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/img/favicon/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/img/favicon/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/img/favicon/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/img/favicon/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/img/favicon/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{asset('/img/favicon/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/img/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/img/favicon/favicon-96x396.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/img/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('/img/favicon/manifest.json')}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{asset('/img/favicon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <!-- Fonts -->

  <link rel="stylesheet" href="{{asset('/fonts/font-text/fonts.css')}}">

  <!-- CSS Bootstrap -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-slider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.css')}}">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bower_components/metisMenu/dist/metisMenu.min.css')}}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}">

    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bower_components/datatables-responsive/css/dataTables.responsive.css')}}">
    <link rel="stylesheet" href="{{asset('/css/datatable.css')}}">

    <!-- Timeline CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/dist/css/timeline.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/dist/css/sb-admin-2.css')}}">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bower_components/morrisjs/morris.css')}}">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bower_components/font-awesome/css/font-awesome.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				        <a class="navbar-brand" href="#">
				      	<img class="icon-menu" src="{{asset('/img/Logo.png')}}">
                <a class="navbar-brand title" href="{{url('/homepageGAIS')}}">GENERAL AFFAIRS INFORMATION SYSTEM</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                @if (\Auth::user() !== null)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img class="icon-menu" src="{{asset('/img/Icon - User.png')}}">
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                      @if (\Auth::user()->role == 'Admin')
                        <li><a href="{{url('/dashboardAdmin')}}">Administrator</a></li> <!-- ganti jadi dashboard admin -->
                        <li class="divider"></li>
                      @endif
                      <li><a href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                @endif
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- The sidebar of your page would go here. -->
        @yield('contentSidebar')
    </div>
    <!-- /#wrapper -->
    <!-- The content of your page would go here. -->
    @yield('content')
    @if(\Auth::user() !== null)
    <div id="wrapper">
      <!--Footer -->
    	<footer class="footer-distributed">
    		General Affairs Information System. 2016
    	</footer>
    </div>
    @endif

      <!-- jQuery -->
      <script type="text/javascript" src="{{asset('css/bower_components/jquery/dist/jquery.min.js')}}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script type="text/javascript" src="{{asset('css/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script type="text/javascript" src="{{asset('css/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

     <!-- Custom Theme JavaScript -->
     <script type="text/javascript" src="{{asset('css/dist/js/sb-admin-2.js')}}"></script>
     
     <!-- DataTables JavaScript -->
     <script type="text/javascript" src="{{asset('css/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
      <!-- Custom Theme JavaScript -->
      <script type="text/javascript" src="{{asset('js/datatable.js')}}"></script>

      <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
          if (!confirm('Are you sure?')) e.preventDefault();
        };
          for (var i = 0, l = elems.length; i < l; i++) {
             elems[i].addEventListener('click', confirmIt, false);
        }
      </script>

      <!-- Menu Toggle Script -->
      <script>
      $(document).ready(function(){
          $('table.display').DataTable({bFilter: false});
         

          $("#notif").click(function() {
            alert();
          });
      });
      </script>

      <script>
      $(document).ready(function(){
          $("#togglemenu").click(function(){
              $("#menu").toggle();
          });
      });
      </script>

      <script>
        $(document).ready(function(){
            $("#acticeToggle").click(function(){
                $("#selfServiceHide").toggle();
            });
        });
      </script>
      <script>
				document.getElementById("dateForPage").innerHTML = Date();
		  </script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
