@extends('layouts.master')
@section('content')

<h1 class="text-blue-800 text-4xl text-center font-bold my-20">🛒 My Cart</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-5">
    @foreach ($carts as $cart )
    <div class="p-5 border rounded-lg shadow-lg flex flex-col items-center bg-white transition transform hover:scale-105">
        <img src="{{asset('image/'.$cart->product->photopath)}}" alt="{{$cart->product->name}}" class="w-32 h-32 object-cover rounded-md mb-4">
        <div class="text-center mb-4">
            <h1 class="text-xl font-bold text-gray-700">{{$cart->product->name}}</h1>
            <p class="text-gray-500">💵 Price: <span class="font-semibold">{{$cart->product->price}}</span></p>
            <p class="text-gray-500">📦 Quantity: <span class="font-semibold">{{$cart->quantity}}</span></p>
            <p class="text-gray-700 font-semibold">Total: <span class="text-green-600">${{$cart->product->price * $cart->quantity}}</span></p>
        </div>
        <div class="grid grid-cols-1 gap-3 w-full">
            <button onclick="showmodal('{{$cart->id}}')" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">🗑️ Remove</button>
            <a href="{{route('checkout',$cart->id)}}" class="bg-green-500 text-white px-4 py-2 rounded-lg text-center hover:bg-green-600">✅ Order Now</a>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal -->
<div class="fixed inset-0 bg-blue-500 bg-opacity-45 backdrop-blur-md hidden items-center justify-center" id="deletemodal">
    <form action="{{route('cart.destroy')}}" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        @csrf
        @method('DELETE')
        <input type="hidden" name="dataid" id="dataid">
        <h1 class="text-2xl font-bold text-center text-blue-500 mb-4">⚠️ Are you sure?</h1>
        <p class="text-center text-gray-600 mb-6">You are about to delete this item from your cart.</p>
        <div class="flex justify-center gap-5">
            <button type="submit" class="bg-blue-500 text-white px-5 py-3 rounded-lg hover:bg-blue-600">Yes, Delete</button>
            <button type="button" onclick="hidemodal()" class="bg-red-600 text-white px-5 py-3 rounded-lg hover:bg-red-700">Cancel</button>
        </div>
    </form>
</div>

<script>
    function hidemodal() {
        document.getElementById('deletemodal').classList.add('hidden');
        document.getElementById('deletemodal').classList.remove('flex');
    }
    function showmodal(id) {
        document.getElementById('dataid').value = id;
        document.getElementById('deletemodal').classList.add('flex');
        document.getElementById('deletemodal').classList.remove('hidden');
    }
</script>

@endsection
