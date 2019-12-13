<html>
  <head>
    <title>MyShop</title>

    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
  </head>
  <body>
    <nav class="navbar bg-dark text-white navbar-dark navbar-expand-lg mb-5">
      <a class="navbar-brand" href="{{ url('/') }}">MyShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="myNav" class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    @yield('content')

    <footer class="bg-dark p-5 text-center mt-5 text-white">
      <p>
        All Rights Reserved. MyShop © 2019
      </p>
    </footer>

    <script src="{{ asset('bootstrap.min.js') }}"></script>
  </body>
</html>
