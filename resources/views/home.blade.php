<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>IT-SUPPORT</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/images/logo-icon-it.png")}}">
    
</head>
<body data-theme="dark" >
	<!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
	<!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" class="toggled">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!--@ include('layouts.sidebar')-->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper -->
        <!-- ============================================================== -->
        <!--@ include('layouts.rightbar')-->
        
        @include('layouts.footer')
	</div>
</body>

<!-- apps -->
<script src="{{asset("assets/js/app.min.js")}}"></script>
<script src="{{asset("assets/js/app.init.js")}}"></script>
<script src="{{asset("assets/js/app-style-switcher.js")}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset("assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")}}"></script>
<script src="{{asset("assets/extra-libs/sparkline/sparkline.js")}}"></script>
<!--Custom JavaScript -->
<script src="{{asset("assets/js/feather.min.js")}}"></script>
<script src="{{asset("assets/js/custom.min.js")}}"></script>
</html>
