@extends('layouts.master')
@extends('layouts.alert')
@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 text-center py-10">Checkout</h2>
    <form action="{{route('order.store')}}" method="POST">
        @csrf
    <div class="grid grid-cols-5 gap-10 px-24 py-10">
        <div class="col-span-2 flex gap-5 shadow-lg border rounded-lg">
            <img src="{{ asset('image/'.$cart->product->photopath) }}" alt="checkout" class="w-1/3">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ $cart->product->name }}</h2>
                <p class="text-lg text-gray-600">Price: {{ $cart->product->price }}</p>
                <p class="text-lg text-gray-600">Quantity: {{ $cart->quantity }}</p>
                <p class="text-lg text-gray-600">Total: {{ $cart->product->price * $cart->quantity }}</p>
                <input type="hidden" name="product_id" value="{{$cart->product_id}}">
                <input type="hidden" name="quantity" value="{{$cart->quantity}}">
                <input type="hidden" name="price" value="{{$cart->product->price}}">
                <input type="hidden" name="cart_id" value="{{$cart->id}}">
            </div>
        </div>
        <div class="border shadow-lg rounded-lg px-2 col-span-2">
            <input type="text" placeholder="Name" name="name" class="w-full border rounded-lg p-2" value="{{auth()->user()->name}}">
            <input type="text" placeholder="Address" name="address" class="w-full border rounded-lg p-2 mt-2">
            <input type="text" placeholder="Phone" name="phone" class="w-full border rounded-lg p-2 mt-2">

        </div>
        <div class="col-span-1 border shadow-lg rounded-lg px-2">
            <h2 class="text-2xl font-semibold text-gray-800">Total: {{ $cart->product->price * $cart->quantity }}</h2>
            <select name="payment_method" class="w-full border rounded-lg p-2 mt-2">
                <option value="COD">Cash On Delivery</option>
            </select>
            <button class="bg-blue-500 text-white p-2 rounded-lg mt-5">Checkout</button>
        </div>
    </div>
    </form>
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="hidden" id="amount" name="amount" value="100" required>
        <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
        <input type="hidden" id="total_amount" name="total_amount" value="110" required>
        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
        <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="hidden" id="success_url" name="success_url" value="{{route('order.storeEsewa',$cart->id)}}" required>
        <input type="hidden" id="failure_url" name="failure_url" value="{{route('mycart')}}" required>
        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
        <input type="hidden" id="signature" name="signature" value="" required>
        <input value="Pay with eSewa" type="submit" class="bg-green-600 text-white block mx-auto p-4 mb-5 px-10 rounded-lg cursor-pointer">
        </form>
        @php
            $total_amount= $cart->product->price * $cart->quantity;
            $transaction_uuid= time();
            $msg="total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
            $secret="8gBm/:&EnhH.1/q";
            $s = hash_hmac('sha256', $msg, $secret, true);
            $signature=base64_encode($s);
        @endphp
<script>

    document.getElementById('amount').value ="{{$total_amount}}";
    document.getElementById('total_amount').value ="{{$total_amount}}";
    document.getElementById('transaction_uuid').value="{{$transaction_uuid}}";
    document.getElementById('signature').value ="{{$signature}}";
</script>
@endsection
