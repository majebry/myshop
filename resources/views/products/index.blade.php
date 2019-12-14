@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-4">
        <h2>Categories</h2>

        @auth
        <a href="{{ url('/categories/create') }}" class="btn btn-primary mb-4">Add new Category</a>
        @endauth

        <ul class="list-group">
          @foreach ($categories as $category)
              <li class="list-group-item bg-secondary text-white">
                <a href="{{ url('/products?category_id=' . $category->id) }}">{{ $category->name }}</a>
              </li>
          @endforeach
        </ul>
      </div>

      <div class="col-8">
        <h2>Products</h2>

        @auth
        <a href="{{ url('/products/create') }}" class="btn btn-primary mb-4">Add new Product</a>
        @endauth

        @if ($products->count())
        <div class="row">
            @foreach($products as $product)
                <div class="col-6 mb-3">

                    <div class="card border-info">
                    <img src="{{ asset($product->image) }}" alt="" class="card-img-top">

                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }} <span class="badge badge-success">{{ $product->price }} LYD</span></h3>

                        <p class="card-text">{{ $product->description }}</p>
                    </div>

                    <div class="card-footer">
                        <a href="{{ url("/products/$product->id") }}" class="btn btn-info">View Product</a>

                        {{ $product->category->name }}
                    </div>
                    </div>

                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">There are no products to show here!</div>
        @endif

    </div>
    </div>
</div>
</div>

@endsection
