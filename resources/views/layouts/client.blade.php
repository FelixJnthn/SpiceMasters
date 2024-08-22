<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand h3 {
            font-size: 24px; /* Ubah ukuran sesuai dengan kebutuhan Anda */
        }

        .nav-items {
            display: flex;
            align-items: center;
        }

        .nav-link.logout {
            font-weight: bold;
            margin-left: 10px; /* Ubah nilai margin sesuai dengan kebutuhan Anda */
            font-size: 18px; /* Ubah ukuran sesuai dengan kebutuhan Anda */
        }

        .nav-link.user {
            font-size: 18px; /* Ubah ukuran sesuai dengan kebutuhan Anda */
        }

        .back-button {
            margin-right: auto; /* Memindahkan tombol Back ke ujung kiri */
            margin-left: 10px; /* Menambah margin kiri agar terpisah dari logo */
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="nav-items">
                    @if(url()->current() != url('/home'))
                        <a href="{{ url('/home') }}" class="nav-link back-button">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    @endif
                    &nbsp
                    <h3>
                        <img src="{{ asset('images/SpiceMasterLogo.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
                        {{ __('SpiceMaster') }}
                    </h3>   
                </div>
                <div class="nav-items">
                    @auth
                        <a href="{{ route('admin.dashboard.index') }}" class="nav-link text-primary user">
                            {{ auth()->user()->name }}
                        </a>
                        <a class="nav-link logout text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                            Logout
                        </a>
                    @endauth
                    <form class="d-none" action="{{ route('logout') }}" id="logout-form" method="post">
                        @csrf 
                    </form>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
