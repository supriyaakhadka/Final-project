@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
    <!-- Total Categories -->
    <div class="px-6 py-8 bg-gradient-to-r from-blue-500 to-green-400 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
        <div class="flex items-center space-x-4">
            <i class="ri-folder-open-line text-5xl"></i>
            <div class="flex">
                <div>
                    <h2 class="text-lg font-semibold">Total Categories</h2>
                    <p class="text-3xl font-bold">{{$totalcategories}}</p>
                </div>
                <a href="{{route('categories.index')}}" class="ml-8 font-bold text-xl underline">View Info >></a>
            </div>
        </div>
    </div>

    <!-- Total Products -->
    <div class="px-6 py-8 bg-teal-500 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
        <div class="flex items-center space-x-4">
            <i class="ri-shopping-bag-line text-5xl"></i>
            <div class="flex">
                <div>
                    <h2 class="text-lg font-semibold">Total Products</h2>
                    <p class="text-3xl font-bold">{{$totalproducts}}</p>
                </div>
                <a href="{{route('products.index')}}" class="ml-8 font-bold text-xl underline">View Info >></a>
            </div>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="px-6 py-8 bg-indigo-500 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
        <div class="flex items-center space-x-4">
            <i class="ri-file-list-line text-5xl"></i>
            <div class="flex">
                <div>
                    <h2 class="text-lg font-semibold">Total Orders</h2>
                    <p class="text-3xl font-bold">{{$totalorders}}</p>
                </div>
                <a href="{{route('orders.index')}}" class="ml-8 font-bold text-xl underline">View Info >></a>
            </div>
        </div>
    </div>

    <!-- Pending Orders -->
    <div class="px-6 py-8 bg-orange-500 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
        <div class="flex items-center space-x-4">
            <i class="ri-time-line text-5xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Pending Orders</h2>
                <p class="text-3xl font-bold">{{$pendingorders}}</p>
            </div>
        </div>
    </div>

    <!-- Total Sales -->
    <div class="px-6 py-8 bg-pink-500 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
        <div class="flex items-center space-x-4">
            <i class="ri-bar-chart-box-line text-5xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Total Sales</h2>
                <p class="text-3xl font-bold">{{$deliveredorders}}</p>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div>
        <canvas id="myChart"></canvas>
        <p class="ml-14">Category-wise Product</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: {!! json_encode($allcategories) !!},
      datasets: [{
        label: '# of Products',
        data: {!! json_encode($categoryproduct) !!},
        backgroundColor: [
          'rgba(255, 99, 132, 0.5)',
          'rgba(54, 162, 235, 0.5)',
          'rgba(255, 206, 86, 0.5)',
          'rgba(75, 192, 192, 0.5)',
          'rgba(153, 102, 255, 0.5)',
          'rgba(255, 159, 64, 0.5)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
      },
    }
  });
</script>

@endsection
