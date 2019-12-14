@extends('layouts.main')

@section('content')
<div class="container mt-5 clearfix">
    <h2>
        {{ $product->name }}

        @if ($product->price)
            <span class="badge badge-success">
                {{ $product->price }} LYD
            </span>
        @endif
    </h2>

    <em>Category: <strong>{{ $product->category->name }}</strong></em>

    <hr>

    <img src="https://via.placeholder.com/350x250" class="float-right img-thumbnail">

    <p>{{ $product->description }}</p>
  </div>
@endsection
