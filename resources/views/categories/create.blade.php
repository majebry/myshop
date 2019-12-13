@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Add new Category</h2>

    <form action="{{ url('/categories') }}" method="POST">
        @csrf

        <div class="row form-group">
            <label class="col-2 col-form-label">Name</label>

            <div class="col-10">
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="row form-group">
            <input type="submit" value="Add" class="btn btn-primary offset-2">
        </div>
    </form>
</div>
@endsection
