<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('application/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('application/plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('application/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('application/css/spinners.css') }}" rel="stylesheet">
    <link href="{{ asset('application/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <style>
        #page-wrapper{ min-height:calc(100vh - 80px) };
    </style>

</head>
<body>
    <div id="wrapper">
      <!-- Navigation -->
      <nav id="header" class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> 

          <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
          <div class="top-left-part" style='margin-top:20px;margin-left:60px;'>
            <a href="/home">              
              UpLexis
            </a>
          </div>

          <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown"> <a class="dropdown-toggle profile-pic"  data-toggle="dropdown" href="#"> {{ Auth::user()->usuario }}</b> </a>
              <ul class="dropdown-menu dropdown-user animated flipInY">
                <li>
                 <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                    Sair
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </ul>
            </li>
          </ul>
        </div>


        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
      </nav>
      <!-- Left navbar-header -->
      <div id="left" class="navbar-default sidebar phidden" role="navigation">
         <div class="sidebar-nav navbar-collapse slimscrollsidebar">
          <ul class="nav" id="side-menu">            
            

            <li><a href="{{ route('captura_artigo') }}" class="waves-effect"><i class="linea-icon ti-magnet fa-fw" data-icon="v"></i> <span class="hide-menu"> Capturar Artigos <span class="fa arrow"></span> </span></a></li>

            <li><a href="{{ route('artigo') }}" class="waves-effect"><i class="linea-icon ti-view-list fa-fw" data-icon="v"></i> <span class="hide-menu"> Ver Artigos <span class="fa arrow"></span> </span></a></li>
            

          </ul>
        </div>
      </div>
      <!-- Left navbar-header end -->
      <!-- Page Content -->
      <div id="page-wrapper">
        <div class="container-fluid">
          @yield('content')
          
          <!-- /.row -->
        <!-- /.container-fluid -->
        </div>
        <footer id="footer" class="footer text-center phidden"> <?php echo date("Y"); ?> &copy; Produzido por Jefferson Mesquita </footer>
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="{{ asset('application/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('application/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('application/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <script src="{{ asset('application/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('application/js/waves.js') }}"></script>
    <script src="{{ asset('application/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>


    <script type="text/javascript">
       $(document).ready(function() {
          //C?IGO PARA RETIRAR O ERRO EM BROWSWE.MSIE
          jQuery.browser = {};
           (function () {
               jQuery.browser.msie = false;
               jQuery.browser.version = 0;
               if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                   jQuery.browser.msie = true;
                   jQuery.browser.version = RegExp.$1;
               }
          })();

          // Switchery
        });
    </script>

    @yield('footer-script')
</body>
</html>
