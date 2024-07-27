@extends('../../include/sidebar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IB - Dashboard</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/iconly.css">
</head>

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        @section('sidebar-menu')
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ route('santridashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('prestasi') }}" class='sidebar-link'>
                        <i class="bi bi-trophy"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('mutabaah') }}" class='sidebar-link'>
                        <i class="bi bi-calendar"></i>
                        <span>Mutaba'ah Santri</span>
                    </a>
                </li>
                <li class="sidebar-item active">
                    <a href="{{ route('nilai') }}" class='sidebar-link'>
                        <i class="bi bi-award"></i>
                        <span>Nilai Santri</span>
                    </a>
                </li>
            </ul>
        @endsection
    </div>
    <div id="main" class='layout-navbar navbar-fixed'>
        <header>
            <nav class="navbar navbar-expand navbar-light navbar-top">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">{{ Auth::user()->nama_lengkap }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->role }}</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        @if (Auth::user()->santri->photo_santri)
                                            <div class="ms-1 avatar avatar-xl">
                                                <img alt="Foto Santri"
                                                    src="{{ asset('storage') }}/images/{{ Auth::user()->santri->photo_santri }}">
                                            </div>
                                        @else
                                            <div class="ms-1 avatar avatar-xl">
                                                @if (Auth::user()->santri->jk_santri == 'Ikhwan')
                                                    <img alt="Foto Ikhwan"
                                                        src="{{ asset('storage') }}/avatars/default_ikhwan.jpg">
                                                @else
                                                    <img alt="Foto Akhwat"
                                                        src="{{ asset('storage') }}/avatars/default_akhwat.jpg">
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end x-slot" aria-labelledby="dropdownMenuButton"
                                style="min-width: 11rem;">
                                <li>
                                    <h6 class="dropdown-header">Hello, {{ Auth::user()->nama_lengkap }}</h6>
                                </li>
                                <li>
                                    <x-dropdown-link :href="route('detailsantri', Auth()->id())" class="dropdown-item">
                                        <i class="icon-mid bi bi-person me-2"></i>
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="#" :href="route('logout')"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="px-5">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('nilai')
        </div>
    </div>

    <script src="{{ asset('template/dist/assets') }}/static/js/components/dark.js"></script>
    <script src="{{ asset('template/dist/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>
    <!-- Need: Apexcharts -->
    <script src="{{ asset('template/dist/assets') }}/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('template/dist/assets') }}/static/js/pages/dashboard.js"></script>
</body>

</html>