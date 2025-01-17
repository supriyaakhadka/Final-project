@extends('layouts.master')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 px-8 lg:px-20 my-10 gap-10">
        <!-- Product Image -->
        <div class="col-span-1">
            <img src="{{ asset('image/' . $product->photopath) }}"
                 alt="Product image of {{ $product->name }}"
                 class="h-96 w-full object-cover rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
        </div>

        <!-- Product Details -->
        <div class="col-span-2 px-4 border-l border-r">
            <h1 class="text-4xl font-bold text-blue-800">{{ $product->name }}</h1>
            <h1 class="text-3xl font-semibold mt-4 text-red-600">Rs.{{ number_format($product->price, 2) }}</h1>

            <!-- Quantity Selector -->
            <form action="{{ route('cart.store') }}" method="post" class="mt-6">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <div class="flex items-center mt-4 space-x-4">
                    <button type="button"
                        class="py-2 px-4 bg-blue-600 text-white text-xl rounded-lg shadow hover:bg-blue-700 transition duration-200"
                        onclick="decreaseqty()" aria-label="Decrease quantity">-</button>
                    <input type="number"
                           class="w-12 py-2 h-10 text-center border rounded"
                           value="1" min="1" max="{{ $product->stock }}"
                           id="quantity" name="quantity" aria-label="Product quantity">
                    <button type="button"
                        class="py-2 px-4 bg-blue-600 text-white text-xl rounded-lg shadow hover:bg-blue-700 transition duration-200"
                        onclick="increaseqty()" aria-label="Increase quantity">+</button>
                </div>

                <!-- Stock Info -->
                <p class="text-gray-500 mt-2">In stock: <span id="stock"
                        class="font-semibold">{{ $product->stock }}</span></p>

                <!-- Add to Cart Button -->
                <button type="submit"
                    class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600 text-white px-5 py-2 rounded-lg shadow-lg mt-6 inline-block hover:from-red-500 hover:to-gray-500 transition-all duration-300">
                    Add to Cart
                </button>
            </form>

            <!-- Add to Wishlist Button -->
            <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                        class="mt-6 bg-red-500 text-white font-bold px-5 py-2 rounded-lg shadow-lg hover:bg-red-600 transition duration-300">
                    Add to Wishlist
                </button>
            </form>
        </div>

        <!-- Additional Information -->
        <div class="col-span-1 space-y-4 text-gray-700">
            <p class="flex items-center space-x-2">
                <span class="text-green-600 font-semibold">✓</span> Free delivery
            </p>
            <p class="flex items-center space-x-2">
                <span class="text-green-600 font-semibold">✓</span> Delivery in 2-3 days
            </p>
            <p class="flex items-center space-x-2">
                <span class="text-green-600 font-semibold">✓</span> 7 days return policy
            </p>
        </div>
    </div>
    <div class="my-10 px-16">
        <h1 class="text-2xl font-bold">Related products</h1>
        <div class="grid grid-cols-4 gap-10 mt-6">
            @foreach ($relatedproducts as $relatedproduct)
            <div class="border shadow-md rounded-lg p-2">
                <a href="{{route('viewproduct',$relatedproduct->id)}}">
                    <img src="{{asset('image/'.$relatedproduct->photopath)}}" alt="" class="h-60 w-full object-cover">
                    <h1 class="text-lg font-bold mt-2">{{$relatedproduct->name}}</h1>
                    <p class="text-gray-500">Rs.{{$relatedproduct->price}}</p>
                </a>
            </div>

            @endforeach
        </div>
    <div>


    <!-- Quantity Update Script -->
    <script>
        function increaseqty() {
            event.preventDefault(); // Prevent page reload
            let quantity = parseInt(document.getElementById('quantity').value);
            const stock = parseInt(document.getElementById('stock').innerText);
            if (quantity < stock) {
                document.getElementById('quantity').value = ++quantity;
            }
        }

        function decreaseqty() {
            event.preventDefault(); // Prevent page reload
            let quantity = parseInt(document.getElementById('quantity').value);
            if (quantity > 1) {
                document.getElementById('quantity').value = --quantity;
            }
        }
    </script>
@endsection
