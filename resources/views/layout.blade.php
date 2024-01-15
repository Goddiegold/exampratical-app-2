<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'G-Store')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>
    <!-- Add other common stylesheets, scripts, etc. -->
</head>
<body>
    @if(session()->has('message'))
    <div class="alert alert-success text-center"
         x-data="{show:true}"
         x-init="setTimeout(()=>show=false,3000)"
         x-show="show">
        {{session()->get('message')}}
    </div>
    @endif
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" 
        href="{{ route('home') }}"
        >G-Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link"
                     href="{{ route('products') }}"
                     >Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                     href="{{ route('services') }}"
                     >Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                     href="{{ route('about') }}"
                     >About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                     href="{{ route('contact') }}"
                     >Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(session('estore-user-token') === null)
                <li class="nav-item">
                    <a class="nav-link"
                     href="{{ route('register') }}"
                     >Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                     href="{{ route('login') }}"
                     >Login</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            @endif
            </ul>
        </div>
    </nav> --}}

    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Add other common scripts, footer, etc. -->
    {{-- <footer class="mt-5">
        <div class="container">
            <p class="text-center">&copy; 2023 G-Store. All rights reserved.</p>
        </div>
    </footer> --}}
</body>
</html>
