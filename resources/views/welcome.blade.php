@extends('layouts.master')
@section('content')
<h1 class="text-gray-900 text-5xl text-center font-extrabold mt-12 mb-6">
    Our Best Sellers
</h1>
<p class="text-gray-700 text-center max-w-2xl mx-auto mb-12 text-lg leading-relaxed">
    Indulge in our delectable range of baked goods crafted with love and premium ingredients. Perfect for every occasion!
</p>
<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 px-6 md:px-16 py-16">
    @foreach ($products as $product)
    <div class="rounded-xl shadow-lg bg-white hover:shadow-2xl transition-shadow transform hover:-translate-y-2">
        <!-- Product Image -->
        <div class="overflow-hidden rounded-t-xl">
            <img src="{{ asset('image/'.$product->photopath) }}" alt="{{ $product->name }}"
                class="h-64 w-full object-cover transition-transform transform hover:scale-105">
        </div>
        <!-- Product Details -->
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            <p class="text-gray-600 text-sm mb-4 leading-snug line-clamp-4">
                {{ $product->description }}
            </p>
            <div class="flex justify-between items-center mt-6">
                <!-- Price -->
                <h1 class="text-2xl font-extrabold text-gray-800">
                    Rs. {{ $product->price }}
                </h1>
                <!-- View Product Button -->
                <a href="{{ route('viewproduct', $product->id) }}"
                    class="bg-gradient-to-r from-gray-700 to-gray-900 text-white px-4 py-2 rounded-full shadow-md hover:from-gray-900 hover:to-gray-700 transition-all">
                    View Product
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
