@extends('layouts.main')

@section('content')
    <div class="container">
        Customer: <strong>{{ $order->customer->name }}</strong>
        <table class="table">
            <tr>
                <th>Product Name</th>
                <th>Sold price</th>
                <th>Quantiy</th>
            </tr>
            @foreach ($order->order_items as $order_item)
                <tr>
                    <td>{{ $order_item->product->name }}</td>
                    <td>{{ $order_item->sold_price }}</td>
                    <td>{{ $order_item->quantity }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
