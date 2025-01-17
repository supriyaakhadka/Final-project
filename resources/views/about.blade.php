<!-- resources/views/about.blade.php -->
@extends('layouts.master')
@section('content')
<h1 class = "text-blue-900 text-4xl text-center font-bold my-20"> About us </h1>


<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 mb-4">

            <p>Welcome to Sweet tooth! We're a locally-owned convenience store dedicated to providing you with quick, reliable, and friendly service, along with all the essentials you need. Whether you're looking for a quick snack, fresh groceries, or everyday items, we're here to make your shopping experience fast, easy, and enjoyable.</p>
            <p>Our mission is to be the go-to store in your neighborhood, offering a wide selection of quality products at affordable prices. From snacks and beverages to household essentials, we stock everything you need, right when you need it.</p>
            <h3>Why Shop with Us?</h3>
            <ul>
                <li>Convenient Location: We're just around the corner, making it easy for you to grab what you need on the go.</li>
                <li>Friendly Staff: Our team is here to help, providing a welcoming and efficient shopping experience.</li>
                <li>Wide Selection: We stock everything from groceries to toiletries, ensuring you have access to everyday essentials.</li>
                <li>Competitive Pricing: We offer great value on top-quality products to fit your budget.</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('image/94b4f10e01f93e38710b05bf84389a6c.png') }}" alt="Convenience Store" class="img-fluid rounded">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h3>Our Story</h3>
            <p>Founded in 2024, Sweet tooth started with a simple idea: to bring convenience and quality to our local community. Over the years, we have grown, but our commitment to providing exceptional service and products has never changed. We are proud to be a part of the community and strive every day to make a difference, one customer at a time.</p>
            <p>Thank you for choosing Sweet tooth. We look forward to serving you!</p>
        </div>
    </div>
</div>
@endsection
