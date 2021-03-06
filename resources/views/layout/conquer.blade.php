<!DOCTYPE html>
	<!-- 
Template Name: Conquer - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 2.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/conquer-responsive-admin-dashboard-template/3716838?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
	<head>
<meta charset="utf-8"/>
<title>ApoteKu</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{asset('assets/css/style-conquer.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/style.css')}}" rel="stylesheet" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<!-- ICONS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
@yield('javascript')
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
	<div class="header navbar  navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
	<div class="page-logo">
            <!-- <a href="{{ route('obat.index') }}"> -->
            <a class="navbar-brand" href="{{ route('obat.index') }}">
                <img src="" alt="">
                    <span>ApoteKu</span>
                </img>
            </a>
        </div>
        <form class="search-form search-form-header" role="form" action="index.html">
            <div class="input-icon right">
                <i class="icon-magnifier"></i>
                <input type="text" class="form-control input-sm" name="query" placeholder="Search...">
            </div>
        </form>
	<!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <img src="assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" src="assets/img/avatar3_small.jpg"/>
                <span class="username">{{ auth()->user()->admin->name }}</span>
                <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block">Logout</button>
                        </form>
                        
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>  
    <!-- END TOP NAVIGATION BAR -->
</div>
	<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
        @php
            $route = Route::current();
            $route = $route->uri();
        @endphp
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="page-sidebar-menu">
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler">
				</div>
				<div class="clearfix">
				</div>
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			</li>
			<li class="sidebar-search-wrapper">
				<form class="search-form" role="form" action="index.html" method="get">
					<div class="input-icon right">
						<i class="fa fa-search"></i>
						<input type="text" class="form-control input-sm" name="query" placeholder="Search...">
					</div>
				</form>
			</li>
            <li class="start ">
				<a href="{{url('/')}}">
				<i class="icon-home"></i>
				<span class="title">Dashboard</span>
				</a>
			</li>
          
            <li <?php echo ($route == 'kategori') ? "class='active'" : "class='start'"; ?>>
				<a href="{{ url('kategori') }}">
				<i class="fa fa-bookmark"></i>
				<span class="title">Kategori</span>
				</a>
			</li>
            <li <?php echo ($route == 'obat') ? "class='active'" : "class='start'"; ?>>
				<a href="{{ url('obat') }}">
				<i class="bi bi-bandaid"></i>
				<span class="title">Obat</span>
				</a>
			</li>
            <li <?php echo ($route == 'pembeli') ? "class='active'" : "class='start'"; ?>>
				<a href="{{ url('pembeli') }}">
				<i class="bi bi-person"></i>
				<span class="title">Pembeli</span>
				</a>
			</li>
            <li <?php echo ($route == 'pembeli-dengan-transaksi-terbanyak' || $route == 'obat-terlaris') ? "class='active'" : "class='start'"; ?>>
                <a href="javascript:;">
                <i class="bi bi-file-earmark-medical-fill"></i>
                <span class="title">Laporan</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li <?php echo ($route == 'obat-terlaris') ? "class='active'" : "class='start'"; ?>>
                        <a href="{{url('obat-terlaris')}}">Obat Terlaris</a>
                    </li>
                    <li <?php echo ($route == 'pembeli-dengan-transaksi-terbanyak') ? "class='active'" : "class='start'"; ?> >
                        <a href="{{url('pembeli-dengan-transaksi-terbanyak')}}">Pembeli dengan transaksi terbanyak</a>
                    </li>
                    <li <?php echo ($route == 'transaksi-semua-pembeli') ? "class='active'" : "class='start'"; ?> >
                        <a href="{{url('transaksi-semua-pembeli')}}">Transaksi semua pembeli</a>
                    </li>
                </ul>
            </li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
            @yield('content')
        </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="footer-inner">
	 2013 &copy; Conquer by keenthemes.
</div>
<div class="footer-tools">
	<span class="go-top">
	<i class="fa fa-angle-up"></i>
	</span>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('assets/plugins/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('assets/scripts/app.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>