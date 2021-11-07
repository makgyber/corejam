<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Quantum Tech Campaign Management System">
    <meta name="author" content="Jon Mereria">
    <meta name="keyword" content="Quantum Tech, Campaign Management System, Dashboard">
    <title>QuantumTech CMS</title>
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/favicon/about-us-uhwis-150x150.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/favicon/about-us-uhwis-150x150.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/favicon/about-us-uhwis-150x150.png')}}">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('assets/favicon/about-us-uhwis-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">

  </head>
  <body class="c-app flex-row align-items-center">

    @yield('content') 

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>

    @yield('javascript')

  </body>
</html>
