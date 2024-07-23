@include('include.bagianatas')
    <body>
        <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
        <div id="app">
            <div id="sidebar">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header position-relative">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <a href=" {{ route('adminsantri') }}">IB Data</a>
                            </div>
                            <div class="sidebar-toggler  x">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item ">
                                <a href="{{ route('santridashboard') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item ">
                                <a href="{{ route('santri') }}" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Data Santri</span>
                                </a>

                            <li class="sidebar-item ">
                                <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                                    <i class="bi bi-exclamation-triangle"></i>
                                    <span>Pelanggaran</span>
                                </a>
                            </li>

                            <li class="sidebar-item ">
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
                    </div>
                </div>
            </div>

            <div id="main" class='layout-navbar navbar-fixed'>
                @include('include.header')
                <div id="main-content">
                    <!-- ThemeModal -->
                    @include('include.thememodal')
                    @yield('nilai')
                </div>
            </div>

        @include('include.bagianbawah')
            
        {{-- <script src="{{ asset('template/dist/assets') }}/static/js/components/dark.js"></script>
        <script src="{{ asset('template/dist/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
        <script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>
            
        <!-- Need: Apexcharts -->
        <script src="{{ asset('template/dist/assets') }}/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('template/dist/assets') }}/static/js/pages/dashboard.js"></script> --}}

    </body>
</html>