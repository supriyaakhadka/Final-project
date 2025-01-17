@extends('layouts.app')
@section('title')
    Edit Product
@endsection
@section('content')
    <form action = "{{route('products.update',$product->id)}}" method='post' class = "mt-5" enctype="multipart/form-data">
        @csrf
        <div class = "mb-5">
            <select name="category_id" class = "p-3 w-full rounded-lg">
                @foreach($categories as $category)
                <option value= "{{$category->id}}"
                    @if ($product->category_id== $category->id)
                    selected
                    @endif
                    >{{$category->name}}  </option>
                @endforeach
            </select>
        </div>



        <div class = "mb-5">
            <input type = "text" placeholder="Enter Product name" class="p-3 w-full rounded-lg"
            name="name" value="{{$product->name}}">
            @error('name')
                <div class = "text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>
        <div class = "grid grid-cols-2 gap-10">
            <div class = "mb-5">
            <input type = "text" placeholder="Enter Product price" class="p-3 w-full rounded-lg"
            name="price" value="{{$product->price}}">
            @error('price')
                <div class = "text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>

        <div class = "mb-5">
            <input type = "text" placeholder="Enter Product Stock" class="p-3 w-full rounded-lg"
            name="stock" value="{{$product->stock}}">
            @error('stock')
                <div class = "text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>
        </div>

        <div class = "mb-5">

            <textarea name="description" rows="5" placeholder="Enter Product descriptions"
            class="p-3 w-full rounded-lg">{{$product->description}}</textarea>
            @error('description')
                <div class = "text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>
        <p>Current Picture:</p>
        <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-44 bg-green-300">
<div class="mb-5">
    <input type="file" name="photopath" class="p-3 w-full rounded-lg">
    @error('photopath')
    <div class="text-red-500 mt-2 text-sm">
        *{{$message}}
    </div>

    @enderror
</div>


        <div class="flex justify-center">
            <button type="Submit" class="bg-indigo-800 text-white py-3 px-5 rounded font-bold"> Edit Product </button>
            <a href="{{ route('products.index')}}" class="bg-red-500 text-white py-3 px-5 rounded font-bold ml-3"> Cancel </a>
        </div>

    </form>
@endsection
