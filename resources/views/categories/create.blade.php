@extends('layouts.app')
@section('title')
    Create Categories
@endsection
@section('content')
<form action="{{route('categories.store')}}" method='post' class="mt-5">
    @csrf
    <div class="mb-5">
        <input type="text" placeholder="Enter your priority" class="p-3 w-full rounded-lg" name="priority" value="{{old('priority')}}">
        @error('priority')
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
    </div> <!-- Close this div -->

    <div class="mb-5">
        <input type="text" placeholder="Enter Categories Name" class="p-3 w-full rounded-lg" name="name">
        @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="flex justify-center">
        <button type="submit" class="bg-indigo-800 text-white py-3 px-5 rounded-lg font-bold">Add category</button>
        <a href="{{route('categories.index')}}" class="bg-red-500 text-white py-3 px-5 rounded font-bold ml-3">Cancel</a>
    </div>
</form>
@endsection
