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

    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
      .bg {
        /* The image used */
        background-image: url("{{ asset('assets/img/philippines-blank-map.png') }}");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.9
      }
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
      
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
  </head>
  <body class="c-app flex-row align-items-center bg">
    <div class="container-fluid">
        <header>
          <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-gradient-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">M6:10</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/blog/about-us">About Us</a>
                  </li>
                </ul>
                <span class="d-flex">
                  <a class="btn btn-sm btn-primary" href="/cms/login">Login</a>
                </span>
              </div>
            </div>
          </nav>
        </header>
    @yield('content') 
    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2021 Quantum Tech &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>
  </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('javascript')

  </body>
</html>