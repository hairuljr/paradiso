<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Login | {{ config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/skote/images/favicon.ico') }}">

  @include('includes.style')

  @stack('addon-style')

</head>
<body>

  @yield('content')

  @include('includes.script')

  @stack('addon-script')
</body>
</html>
