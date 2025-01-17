<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>

    <!-- Styles -->
    <style>
        body {
            background-color: #f9fafb;
        }
        .sidebar {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .sidebar a:hover {
            background: #2563eb;
            transform: scale(1.05);
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar img {
            border-radius: 50%;
            border: 2px solid white;
        }
        .content {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            color: #1d4ed8;
        }
        button {
            transition: background 0.3s ease;
        }
        button:hover {
            background: #f1f5f9;
        }
    </style>
</head>
<body class="font-sans antialiased">
    @include('layouts.alert')

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-56 h-screen sidebar shadow-lg">
            <div class="text-center mt-5">
                <img src="{{ asset('image/Screenshot 2025-01-15 092515.png') }}" alt="Logo" class="w-20 mx-auto">
                <h2 class="mt-2 font-bold text-lg">Bakery Dashboard</h2>
            </div>

            <div class="mt-8">
                <a href="{{ route('dashboard') }}">
                    <i class="ri-dashboard-line"></i> Dashboard
                </a>
                <a href="{{ route('categories.index') }}">
                    <i class="ri-folder-line"></i> Categories
                </a>
                <a href="{{ route('products.index') }}">
                    <i class="ri-cake-2-line"></i> Products
                </a>
                <a href="{{ route('users.index') }}" class="bg-blue-700 hover:bg-blue-800 text-white rounded-lg">
                    <i class="ri-user-line"></i> Users
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left text-white hover:bg-red-500 rounded p-3">
                        <i class="ri-logout-box-line"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="p-4 flex-1">
            <div class="content">
                <h1 class="text-2xl font-bold header">@yield('title')</h1>
                <hr class="h-1 bg-blue-500 mb-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
