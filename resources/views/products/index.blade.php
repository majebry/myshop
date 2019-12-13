<html>
  <head>
    <title>MyShop</title>

    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
  </head>
  <body>
    <nav class="navbar bg-dark text-white navbar-dark navbar-expand-lg">
      <a class="navbar-brand" href="index.html">MyShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="myNav" class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="index.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="cart.html" class="nav-link">Cart</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="row">
        <div class="col-4">
          <h2>Categories</h2>

          <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item bg-secondary text-white">{{ $category->name }}</li>
            @endforeach
          </ul>
        </div>

        <div class="col-8">
          <h2>Products</h2>

          <div class="row">

            @foreach($products as $product)
            <div class="col-6 mb-3">

                <div class="card border-info">
                  <img src="https://via.placeholder.com/350x250" alt="" class="card-img-top">

                  <div class="card-body">
                    <h3 class="card-title">{{ $product->name }} <span class="badge badge-success">{{ $product->price }} LYD</span></h3>

                    <p class="card-text">{{ $product->description }}</p>
                  </div>

                  <div class="card-footer">
                    <a href="single.html" class="btn btn-info">View Product</a>

                    {{ $product->category->name }}
                  </div>
                </div>

              </div>
            @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-dark p-5 text-center mt-5 text-white">
      <p>
        All Rights Reserved. MyShop © 2019
      </p>
    </footer>

    <script src="{{ asset('bootstrap.min.js') }}"></script>
  </body>
</html>
