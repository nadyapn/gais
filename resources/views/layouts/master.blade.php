<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
 
  <!-- CSS Component -->
  <link rel="stylesheet" href="{{asset('/css/component.css')}}">

  <!-- CSS Sidebar -->
  <link rel="stylesheet" href="{{asset('/css/simple-sidebar.css')}}">
  @yield('styles')
  
</head>
<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img class="icon-menu" src="{{asset('/img/Logo.png')}}">
          </a>
          <a class="navbar-brand title" href="">
            General Affairs Information System
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#" id="togglemenu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <img class="icon-menu" src="{{asset('/img/Icon - User.png')}}">
              </a>
              <ul class="dropdown-menu" id="menu" role="menu">
                <li><a href="/laravel33/public/dashboardNonAdmin">Supervisor</a></li>
                <li><a href="/laravel33/public/dashboardAdmin">Administrator</a></li>
                <li><a href="#">HR Unit</a></li>
                <li class="divider"></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="" aria-expanded="false">

              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>

            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
			
   @yield('content')

  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 copyright">
          All Right Reserved © General Affairs Information System. 2016
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/bootstrap-select.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/bootstrap-slider.min.js')}}js/"></script>
  <script type="text/javascript" src="{{asset('/js/bootstrap.file-input.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/moment-with-locales.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/main.js')}}"></script>
 
   <!-- jQuery -->
    <script src="{{asset('/js/jquery.js')}}"></script>

   <script>
    $(document).ready(function(){
        $("#togglemenu").click(function(){
            $("#menu").toggle();
        });
    });
    </script>

    <script>
      $(document).ready(function(){
          $(".buttonHomepage").click(function(){
              $("#conDashboard2").toggle();
          });
      });
    </script>

</body>
</html>
			