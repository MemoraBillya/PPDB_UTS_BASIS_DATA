<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zonasi @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 280px;
            background-color: #F5F5F7;
            color: black;
            border: 1px solid #D4D7E3;
            padding: 0px;
            display: flex;
            flex-direction:column;
            align-items: flex-start;
            position: fixed;
            height: 100vh; 
        }
        .sidebar .logo-container {
            display: flex;
            align-items: center;
            padding: 10px;
        }
        .sidebar img.logo {
            width: 50px; /* Ukuran logo lebih kecil */
            height: auto;
            margin-right: 10px; /* Jarak antara logo dan teks */
        }
        .sidebar h2 {
            color: black;
            font-weight: bold;
            font-size: 20px;
            margin: 0;
        }
        .sidebar a {
            color: black;
            font-size: 16px;
            margin-bottom: 10px;
            font-weight: bold;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a i {
            margin-right: 10px; /* Memberikan jarak antara ikon dan teks */
        }
        .sidebar a:hover {
            background-color: #007bff;
            text-decoration: none;
        }
        .main-content {
            margin-left: 235px;
            padding: 0px;
            background-color: #ffffff;
            width:180vh;
            height: 180vh;
            padding: 30px; 
            overflow: hidden;
        }
        .container {
            width: 150%;
        }
        h2 {
            margin-top: 20px; /* Atur jarak ke atas */
            font-weight: bold; /* Tambahkan style tebal */
        }
        .table {
            margin-top: 20px; /* Atur jarak tabel */
        }

        .text-center {
            text-align: center; /* Memastikan konten teks di tengah */
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo-container">
                <img src="{{ asset('images/images (1).png') }}" alt="Logo" class="logo">
                <h2>PPDB Surabaya 202X</h2>
            </div>
            <a href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-house"></i>Home</a>
            <a href="{{ route('admin.pendaftaran.index') }}">
                <i class="fa-solid fa-database"></i>Data Pendaftar</a>
            <a href="{{ route('admin.zonasi.index') }}">
                <i class="fa-solid fa-location-dot"></i>Zonasi</a>
            <a href="{{ route('admin.pengumuman.index') }}">
                <i class="fa-solid fa-envelope"></i>Pengumuman</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <div class="container">
                <h2 class="mb-4">@yield('title')</h2>
                
                <!-- Flash messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Content section -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="
