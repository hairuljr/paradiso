<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Dashboard | {{ config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/skote/images/favicon.ico') }}">

  @include('includes.style')

  @stack('addon=style')

</head>

<body data-sidebar="dark">

  <!-- <body data-layout="horizontal" data-topbar="dark"> -->

  <!-- Begin page -->
  <div id="layout-wrapper">


    <x-topbar />

    <!-- ========== Left Sidebar Start ========== -->
    <x-left-sidebar />
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      @yield('content')
      <!-- End Page-content -->

      @stack('modal')

      <x-footer />
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->

  <!-- Right Sidebar -->
  <x-right-sidebar />
  <!-- /Right-bar -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>
  @include('includes.script')

  @stack('addon-script')
</body>

</html>
