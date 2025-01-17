<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakery Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General Styles */
        body {
            background-color: #fdf5f8;
            color: #4a4a4a;
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(90deg, #ff7eb3, #ff758c);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            font-weight: 500;
            text-transform: uppercase;
        }

        .navbar a:hover {
            color: #ffd1dc;
        }

        .btn-primary {
            background: #ff758c;
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background: #ff93a7;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-overlay {
            background: rgba(255, 255, 255, 0.7);
        }

        .hero-text {
            color: #4a4a4a;
            font-size: 3rem;
            font-weight: 600;
            text-shadow: 1px 1px 4px rgba(255, 255, 255, 0.8);
        }

        /* Footer Styles */
       footer {
    font-family: 'Roboto', sans-serif;
}

footer h2 {
    font-weight: bold;
}

footer a {
    text-decoration: none;
    color: inherit;
}

footer a:hover {
    text-decoration: underline;
}

footer .container {
    max-width: 1200px;
    margin: 0 auto;
}

        /* Input Styles */
        .search-input {
            border: 2px solid #ff758c;
            border-radius: 8px;
            padding: 0.5rem;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: #ff93a7;
            outline: none;
        }

        /* Image Hover Styles */
        .hover-effect {
            position: relative;
            display: inline-block;
            overflow: hidden;
            cursor: pointer;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hover-effect img {
            transition: transform 0.4s ease;
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hover-effect:hover img {
            transform: scale(1.1);
        }

        .hover-effect .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .hover-effect:hover .overlay {
            opacity: 1;
        }

        /* Scroll Animation Styles */
        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .animate-scroll {
            display: flex;
            gap: 2rem;
            animation: scroll 15s linear infinite;
        }

        .animate-scroll > div {
            flex: 0 0 auto;
        }
        .logo-container {
    justify-content: flex-start;
    margin-left:10;
}

    </style>

</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Top Navbar -->
    <nav class="bg-gradient-to-r from-pink-500 to-pink-300 text-white px-6 py-2">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="tel:2345678976" class="flex items-center space-x-1">
                    <i class="fa fa-phone"></i>
                    <span>056-501556</span>
                </a>
                <a href="https://instagram.com" class="hover:text-pink-500"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com" class="hover:text-pink-500"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://whatsapp.com" class="hover:text-pink-500"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
            <div>
                @auth

                <span class="relative">
                    <a href="{{ route('mycart') }}" class="p-2 text-black font-bold"><i class="fa fa-shopping-cart"></i>My
                        Cart</a>
                        <span class="absolute top-[-8px] right-[-6px] w-5 h-5 text-xs flex items-center justify-center bg-red-600 text-white rounded-full px-0.5">
                            @auth
                                @php
                                    $no_of_items = \App\Models\Cart::where('user_id',auth()->id())->Count();

                                @endphp
                                {{$no_of_items}}
                                @else
                                0
                            @endauth
                        </span>
                    </span>


                <a href="{{route('wishlist.index')}}" class="p-2 relative text-white font-bold text-lg inline-block group"><i class="fa-regular fa-heart "></i> My Wishlist</a>

                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="p-2 hover:text-pink-600">Logout</button>
                </form>
                @else

                @endauth
            </div>
        </div>
    </nav>

    <nav class="navbar sticky top-0 z-10 bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center logo-container">
                <img src="{{ asset('image/Screenshot 2025-01-15 092515.png') }}" alt="Sweet bites" class="h-16">
            </div>


            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8 text-lg">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">Home</a>
                @php
                    $categories = App\Models\Category::orderBy('priority')->get();
                @endphp
                @foreach($categories as $category)
                    <a href="{{ route('categoryproduct', $category->id) }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">
                        {{ $category->name }}
                    </a>
                @endforeach
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">About</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">Contact</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center space-x-4">
                <button id="mobile-menu-toggle" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Login Button -->
            <div class="ml-2">
                @auth
                <span class="text-gray-700 font-small">Welcome, {{ auth()->user()->name }}!</span>
                @else
                <a href="/login" class="btn-primary px-6 py-2 bg-gray-800 text-white rounded-full shadow-lg hover:bg-gray-900 transition">
                    Login
                </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden bg-gradient-to-r from-yellow-300 via-red-300 to-pink-300 shadow-lg p-4">
        <div class="flex flex-col space-y-4">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-white transition font-medium">Home</a>
            @foreach($categories as $category)
                <a href="{{ route('categoryproduct', $category->id) }}" class="text-gray-700 hover:text-white transition font-medium">
                    {{ $category->name }}
                </a>
            @endforeach
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-white transition font-medium">About</a>
            <a href="{{ route('contact') }}" class="text-gray-700 hover:text-white transition font-medium">Contact</a>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>



        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden  flex-col space-y-4 bg-gradient-to-r from-yellow-300 via-red-300 to-pink-300 p-4 text-center shadow-md">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">Home</a>

            <a href="{{ route('about') }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">About</a>
            <a href="{{ route('contact') }}" class="text-gray-700 hover:text-white transition font-medium hover:underline">Contact</a>
        </div>
    </nav>

    <script>
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>


   <!-- Photo Section -->
   @if (Route::is('home'))
   <div
    class="bg-cover bg-center relative swap-photo"
    style="
        background-image: url('{{ asset('image/2_Desktop_1 (1).webp') }}');
        height: 400px;
        background-size: cover;
        background-position: center center;
        transition: background-position 1s ease-in-out;
    "
    data-image-one="{{ asset('image/2_Desktop_1 (1).webp') }}"
    data-image-two="{{ asset('image/1_Desktop_1.webp') }}"
>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const swapPhotoDiv = document.querySelector('.swap-photo');

        if (swapPhotoDiv) {
            const imageOne = swapPhotoDiv.dataset.imageOne;
            const imageTwo = swapPhotoDiv.dataset.imageTwo;

            let isSliding = false;
            let currentImage = imageOne;

            const startSlidingEffect = () => {
                if (isSliding) return; // Avoid multiple triggers
                isSliding = true;

                // Set an interval to toggle the background position
                let position = "center right";
                setInterval(() => {
                    swapPhotoDiv.style.backgroundImage = `url('${currentImage}')`;
                    swapPhotoDiv.style.backgroundPosition = position;

                    // Toggle image and position
                    position = position === "center right" ? "center left" : "center right";
                    currentImage = currentImage === imageOne ? imageTwo : imageOne;
                }, 3000); // Change every 3 seconds
            };

            // Start the sliding effect when the page loads
            startSlidingEffect();
        }
    });
</script>
<!-- Photo Section -->
@if (Route::is('home'))



<style>
    @keyframes scroll {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .animate-scroll {
        display: flex;
        gap: 1.5rem;
        animation: scroll 12s linear; /* Removed 'infinite' */
        animation-iteration-count: 1; /* Ensures the animation stops after one round */
    }

    .animate-scroll > div {
        flex: 0 0 auto;
    }
</style>

@endif

<style>
    @keyframes scroll {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .animate-scroll {
        display: flex;
        gap: 1.5rem;
        animation: scroll 12s linear infinite; /* Increased duration to accommodate more items */
    }

    .animate-scroll > div {
        flex: 0 0 auto;
    }
</style>



    <!-- Content Section -->
    <main class="min-h-screen p-8">
        @yield('content')
    </main>

    @if (Route::is('home'))
<div class="bg-cover bg-center relative" style="background-image: url('{{ asset('image/Screenshot 2025-01-07 094049.png') }}'); height: 400px;">
</div>
@endif
    </div>
    <!-- Footer -->
    <footer class="bg-pink-400 text-white">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-8 lg:px-20 py-12">
            <!-- Logo and About Section -->
            <div>
                <h2 class="text-2xl  text-black font-semibold">LOGO</h2>
                <p class="mt-4 text-sm text-black">
                    Delightful baked goods for every occasion! Bringing happiness one bite at a time.
                </p>
            </div>

            <!-- Quick Links Section -->
            <div>
                <h2 class="text-xl font-semibold  text-black mb-4">Quick Links</h2>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-pink-500 transition  text-black">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-pink-500 transition  text-black">About</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-pink-500 transition  text-black">Contact</a></li>
                    <li><a href="/login" class="hover:text-pink-500 transition  text-black">Login</a></li>
                </ul>
            </div>

            <!-- Contact Info Section -->
            <div>
                <h2 class="text-xl text-black font-semibold mb-4">Contact Us</h2>
                <ul class="space-y-2">
                    <li>
                        <span class="font-medium text-black">Email: </span>
                        <a href="mailto:test@gmail.com" class="hover:text-pink-500 transition  text-black">test@gmail.com</a>
                    </li>
                    <li>
                        <span class="font-medium text-black">Phone: </span>
                        <a href="tel:9742538007" class="hover:text-pink-500   text-black transition">9742538007</a>
                    </li>
                    <li>
                        <span class="font-medium text-black">Address: </span>
                        <span class="text-black">Kathmandu, Chitwan, Nepal</span>
                    </li>

                </ul>
            </div>

            <!-- Social Links Section -->
            <div>
                <h2 class="text-xl text-black font-semibold mb-4">Follow Us</h2>
                <ul class="flex space-x-4">
                    <li>
                        <a href="#" class="text-black hover:text-pink-500 transition">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black hover:text-pink-500 transition">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black hover:text-pink-500 transition">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black hover:text-pink-500 transition">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-pink-300 text-center py-4  text-black">
            <p>&copy; 2024 <span class="font-semibold text-pink-500"></span>. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
