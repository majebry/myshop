@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Add New Product</h2>

    @if ($errors->count())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row form-group">
            <label class="col-2 col-form-label">Name</label>

            <div class="col-10">
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Price</label>

            <div class="col-10">
                <input type="number" name="price" class="form-control">
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Description</label>

            <div class="col-10">
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Category</label>

            <div class="col-10">
                <select name="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <label class="col-2 col-form-label">Image</label>

            <div class="col-10">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="row form-group">
            <input type="submit" value="Add" class="btn btn-primary offset-2">
        </div>
    </form>
</div>

@endsection
