@extends('layouts.main')

@section('content')
    <div class="container">
        <form action="">
            name: <input type="text" name="customer_name">
            created after <input type="date" name="created_after">
            created before <input type="date" name="created_before">
            <input type="submit">
        </form>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Total Price</th>
                <th>Created At</th>
                <th>Options</th>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->order_items()->sum(\DB::raw('sold_price * quantity')) }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ url('orders/' . $order->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
