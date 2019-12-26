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

                        <div id="product-rate-{{$product->id}}">
                            <select name="rating" onchange="rate({{ $product->id }}, this.value)">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ url("customer/products/$product->id") }}" class="btn btn-info">View</a>
                    </div>
                    </div>

                </div>
                @endforeach

                <div class="mx-auto">
                    {{ $products->links() }}
                </div>
            </div>
        @else
            <div class="alert alert-warning">There are no products to show here!</div>
        @endif

    </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        function rate(productId, value) {
            axios.post('/customer/products/' + productId + '/ratings', {
                rating: value
            })
            .then(function(response) {
                document.getElementById('product-rate-' + productId).innerHTML = response.data.average
            });
        }
    </script>
@endsection
