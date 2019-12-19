@extends('customer.layouts.main')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-4">
        <h2>Categories</h2>

        @auth
        <a href="{{ url('/categories/create') }}" class="btn btn-primary mb-4">Add new Category</a>
        @endauth

        <div class="list-group">
          @foreach ($categories as $category)
            <a class="list-group-item list-group-item-action bg-secondary text-white" href="{{ url('/products?category_id=' . $category->id) }}">{{ $category->name }}</a>
          @endforeach
        </div>
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
                    <img src="{{ asset(Storage::url($product->image)) }}" alt="" class="card-img-top">

                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }} <span class="badge badge-success">{{ $product->price }} LYD</span></h3>

                        <p class="card-text">{{ $product->description }}</p>

                        <em>Category: <strong>{{ $product->category->name }}</strong></em>
                    </div>

                    <div class="card-footer">
                        <a href="{{ url("/products/$product->id") }}" class="btn btn-info">View</a>
                        @auth
                        <a href="{{ url("/products/$product->id/edit") }}" class="btn btn-warning">Edit</a>

                        <form action="{{ url("/products/$product->id") }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                        @endauth
                    </div>
                    </div>

                </div>
                @endforeach

                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-warning">There are no products to show here!</div>
        @endif

    </div>
    </div>
</div>
</div>

@endsection
