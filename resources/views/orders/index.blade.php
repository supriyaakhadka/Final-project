@extends('layouts.app')
@section('title') Orders
@endsection
@section('content')
<table class="mt-5 w-full">

        <tr>
            <th class="border p-2 ">Order Time</th>
            <th class="border p-2 ">Product Image</th>
            <th class="border p-2 ">Product Name</th>
            <th class="border p-2 ">Customer Name</th>
            <th class="border p-2 ">Phone</th>
            <th class="border p-2 ">Address</th>
            <th class="border p-2 ">Quantity</th>
            <th class="border p-2 ">Price</th>
            <th class="border p-2 ">Total</th>
            <th class="border p-2 ">Payment Method</th>
            <th class="border p-2 ">Status</th>
            <th class="border p-2 ">Action</th>
        </tr>
        @foreach ($orders as $order )
        <tr>
            <td class="border p-2">{{$order->created_at}}</td>
            <td class="border p-2">
                <img src="{{asset('image/'.$order->product->photopath)}}" alt="" class="h-24">
            </td>
            <td class="border p-2">{{$order->product->name}}</td>
            <td class="border p-2">{{$order->name}}</td>
            <td class="border p-2">{{$order->phone}}</td>
            <td class="border p-2">{{$order->address}}</td>
            <td class="border p-2">{{$order->quantity}}</td>
            <td class="border p-2">{{$order->price}}</td>
            <td class="border p-2">{{$order->quantity * $order->price}}</td>
            <td class="border p-2">{{$order->payment_method}}</td>
            <td class="border p-2">{{$order->status}}</td>
            <td class="border p-2 grid gap-1">
                <a href="{{route('orders.status',[$order->id,'Pending'])}}" class="bg-blue-600 text-white p-2 rounded-lg"> Pending</a>
                <a href="{{route('orders.status',[$order->id,'Processing'])}}" class="bg-red-400 text-white p-2 rounded-lg">Processing</a>
                <a href="{{route('orders.status',[$order->id,'Delivered'])}}" class="bg-purple-500 text-white p-2 rounded-lg">Delivered</a>
            </td>
        </tr>
        @endforeach
</table>


@endsection
