<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Bits</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-600 min-h-screen flex items-center justify-center">

    <div class="grid grid-cols-1 md:grid-cols-2 bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Left Section with Image -->
        <div class="hidden md:block">
            <img src="{{ asset('image/243030f7a7bf3d885d23cb64465ad5c3.png') }}" alt="" class="h-full w-full object-cover">
        </div>

        <!-- Right Section with Form -->
        <div class="flex items-center justify-center p-10">
            <div class="text-center w-full">
                <img src="{{ asset('image/Screenshot 2024-07-18 111029.png') }}" alt="" class="h-24 mx-auto mb-5">
                <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Welcome to Sweet tooth</h1>
                <p class="text-gray-600 mb-8">Sign in to continue</p>

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    <!-- Email Input -->
                    <div>
                        <input type="email" name="email" placeholder="Email"
                               class="block w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <input type="password" name="password" placeholder="Password"
                               class="block w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                            class="bg-indigo-500 text-white py-3 w-full rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 transition">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
