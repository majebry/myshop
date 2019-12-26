@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ url('admin/products/create') }}" class="btn btn-primary mb-4">Add new Product</a>

        <table class="table">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Options</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ url("admin/products/$product->id/edit") }}" class="btn btn-warning">Edit</a>

                        <form action="{{ url("admin/products/$product->id") }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
