<form action="{{ url('/products') }}" method="POST">
    @csrf

    name: <input type="text" name="name"><br>
    price <input type="number" name="price"><br>
    description <textarea name="description"></textarea><br>

    <input type="submit" value="Add">
</form>
