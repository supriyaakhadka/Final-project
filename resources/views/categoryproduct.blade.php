@extends('layouts.master')
@section('content')
<h1 class = "text-blue-800 text-4xl text-center font-bold mt-10"> {{$category->name}} Products </h1>

<div class="grid grid-cols-4 gap-10 px-20 py-12">
    @foreach ($products as $product )
    <div class = "rounded-lg shadow-md p-4">
        <img src="{{asset('image/'.$product->photopath)}}" alt="" class="h-44 w-full object-cover">
        <h1 class = "text-xl font-bold mt-2">{{$product->name}}</h1>
        <p class = "text-gray-500 line-clamp-3"> {{$product->description}} </p>

      <div class="flex justify-between items-center mt-4">
        <h1 class = "text-xl font-bold">Rs.{{$product->price}} </h1>
        <a href="{{route('viewproduct',$product->id)}}" class = "bg-gradient-to-r from-red-600 to-blue-500 text-white px-3 py-1.5 rounded-lg"> view product </a>
      </div>
    </div>
    @endforeach
</div>


@endsection
