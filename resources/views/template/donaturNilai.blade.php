@extends('../../include/adminsidebar')
@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        @section('sidebar-menu')
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard.donatur') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="{{ route('donatur.santri') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Data Santri</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('donatur.pelanggaran') }}" class='sidebar-link'>
                    <i class="bi bi-exclamation-triangle"></i>
                    <span>Pelanggaran</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('donatur.prestasi') }}" class='sidebar-link'>
                    <i class="bi bi-trophy"></i>
                    <span>Prestasi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('donatur.mutabaah') }}" class='sidebar-link'>
                    <i class="bi bi-calendar"></i>
                    <span>Mutaba'ah Santri</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a href="{{ route('donatur.nilai') }}" class='sidebar-link'>
                    <i class="bi bi-award"></i>
                    <span>Nilai Santri</span>
                </a>
            </li>
        </ul>
    @endsection
        
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content p-0">
                @yield('donaturNilai')
            </div>
        </div>

        @include('include.bagianbawah')
    </div>
</body>

</html>
