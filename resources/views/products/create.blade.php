<form action="{{ url('/products') }}" method="POST">
    @csrf

    name: <input type="text" name="name"><br>
    price <input type="number" name="price"><br>
    description <textarea name="description"></textarea><br>

    <select name="category">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }} </option>
        @endforeach
    </select>
    <br>

    <input type="submit" value="Add">
</form>
