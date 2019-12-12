<form action="{{ url('/categories') }}" method="POST">
    @csrf

    name <input type="text" name="name">

    <input type="submit">
</form>
