@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ url('admin/categories/create') }}" class="btn btn-primary mb-4">Add new category</a>

        <table class="table">
            <tr>
                <th>Category Name</th>
                <th>Options</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ url("admin/categories/$category->id") }}" method="post" style="display: inline;">
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
