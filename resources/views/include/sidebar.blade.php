<div id="sidebar">
    <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href=" {{ route('santri') }}">IB Data</a>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <h4 class="sidebar-title">Menu</h4>
                <li class="sidebar-item ">
                <a href="{{ route('santridashboard') }}" class='sidebar-link '>
                    <i class="bi bi-grid-fill"></i>
                    <p class="dika ml-4">Dashboard</p>
                </a>
            </li>
            <li class="sidebar-item active">
                <a href="{{ route('santri') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <p class="dika ml-4">Data Santri</p>
                </a>
            </li>
        
            <li class="sidebar-item ">
                <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                    <i class="bi bi-exclamation-triangle"></i>
                    <p class="dika ml-4">Pelanggaran</p>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="{{ route('prestasi') }}" class='sidebar-link'>
                    <i class="bi bi-trophy"></i>
                    <p class="dika ml-4">Prestasi</p>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="{{ route('mutabaah') }}" class='sidebar-link'>
                    <i class="bi bi-calendar"></i>
                    <p class="dika ml-4">Mutabaah Santri</p>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="{{ route('nilai') }}" class='sidebar-link'>
                    <i class="bi bi-paper fill"></i>
                    <p class="dika ml-4">Nilai Santri</p>
                </a>
            </li>
        </ul>
    </div>
    </div>
</div>