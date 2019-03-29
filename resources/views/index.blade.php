<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sentiment Analysis</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ URL('vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href="{{ URL('assets/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" />
    <link href="{{ URL('assets/css/pe-icon-7-stroke.css') }} " rel="stylesheet" />
    <link href="{{ URL('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }} " rel="stylesheet" />
    <link href="{{ URL('assets/plugins/clockpicker/clockpicker.css') }} " rel="stylesheet" />
    <link href="{{ URL('assets/plugins/chartist/chartist.min.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL('assets/plugins/morris/morris.css') }}">
        <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL('css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ URL('images/favicon.png')}}" />
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      	@include('layouts.navbar')
        
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

          @include('layouts.sidebar')

        </nav>
        <!-- partial -->
        <div class="main-panel">

          @yield('content')

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          @include('layouts.footer')

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ URL('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ URL('vendors/js/vendor.bundle.addons.js') }}  "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!--   Core JS Files   -->
    <script src="{{ URL('assets/js/jquery-2.1.1.js') }} " type="text/javascript"></script>
    <script src="{{ URL('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL('assets/js/bootstrap.min.js') }} " type="text/javascript"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ URL('assets/js/bootstrap-checkbox-radio-switch.js')}}"></script>
    <!--  Charts Plugin -->
    <script src="{{ URL('assets/js/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ URL('assets/js/bootstrap-notify.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="{{ URL('assets/js/light-bootstrap-dashboard.js')}}"></script>
    <script src="{{ URL('assets/plugins/chartist/chartist.min.js') }}"></script>
    <script src="{{ URL('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL('assets/plugins/clockpicker/clockpicker.js') }}"></script>
    <script src="{{ URL('assets/js/demo.js') }}"></script>
    <script src="{{ URL('lib/example.js') }}"></script>
    <script src="{{ URL('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
    <script type="{{ URL('text/javascript') }}">
       $('#input-date .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
   </script>
    @include('sweet::alert')
    @yield('javascript_chart')
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ URL('js/off-canvas.js') }}"></script>
    <script src="{{ URL('js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ URL('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
  </body>

</html>