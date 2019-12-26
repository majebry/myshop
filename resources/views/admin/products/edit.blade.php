@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Product: {{ $product->name }} </h2>

    @if ($errors->count())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row form-group">
            <label class="col-2 col-form-label">Name</label>

            <div class="col-10">
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Price</label>

            <div class="col-10">
                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Description</label>

            <div class="col-10">
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Category</label>

            <div class="col-10">
                <select name="category" class="form-control">
                    @foreach ($categories as $category)
                        <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Image</label>

            <div class="col-10">
                <input type="file" name="image" class="form-control">

                @if ($product->image)
                    <img src="{{ asset(Storage::url($product->image)) }}" alt="" width="250">
                @endif
            </div>
        </div>

        <div class="row form-group">
            <input type="submit" value="Edit" class="btn btn-primary offset-2">
        </div>
    </form>
</div>

@endsection
