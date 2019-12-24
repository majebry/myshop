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
          <!-- Authentication Links -->
          @guest('web_customer')
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ auth('web_customer')->user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
        </ul>
      </div>
    </nav>

    @yield('content')

    <footer class="bg-dark p-5 text-center mt-5 text-white">
      <p>
        All Rights Reserved. MyShop © 2019
      </p>
    </footer>

    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap.min.js') }}"></script>

    @yield('scripts')
  </body>
</html>
