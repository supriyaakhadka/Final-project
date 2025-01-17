@extends('layouts.master')



@section('content')
<h1 class="text-4xl font-bold text-black  text-center py-12">My Wishlist</h1>
    <div class="mx-auto container mt-4 ">


        @if ($wishlists->isEmpty())
            <div class="alert alert-info">
                Your wishlist is currently empty. Start adding products you love!
            </div>
        @else
            <div class="row grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-3 gap-10 cursor-pointer">
                @foreach ($wishlists as $wishlist)
                    <div class="col-md-4 mb-4 rounded-xl ">
                        <div class="card h-100 rounded-xl shadow-lg border-gray-500">
                            <img src="{{ asset('image/' . $wishlist->product->photopath) }}" class="h-56 w-30 object-cover card-img-top mx-auto"
                                alt="{{ $wishlist->product->name }}">
                            <div class="card-body mt-2 ml-2 font-semibold">
                                <h5 class="card-title">Product Name: <span class="text-red-500"> {{ $wishlist->product->name }}</span></h5>
                                <p class="card-text">Description: {{ $wishlist->product->description ?? 'No description available.' }}
                                </p>
                                <p class="text-muted">Price: <span class="text-yellow-500"> Rs. {{ number_format($wishlist->product->price, 2) }}</span></p>
                            </div>
                            <div class=" flex card-footer d-flex justify-content-between align-items-center mb-4 ml-2 mt-2">
                                <a href="{{ route('products.index', $wishlist->product->id) }}"
                                    class="mb-2 btn btn-primary btn-sm flex items-center bg-green-500 text-white px-5 py-3 rounded-lg font-semibold shadow-md hover:bg-green-700 transform hover:scale-105 hover:translate-y-1 transition-all duration-300">View Product</a>
                                <form action="{{ route('wishlist.destroy', $wishlist->product_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4 btn btn-danger btn-sm flex items-center bg-red-500 text-white px-5 py-3 rounded-lg font-semibold shadow-md hover:bg-red-700 transform hover:scale-105 hover:translate-y-1 transition-all duration-300">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
@endsection
