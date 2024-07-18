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
                <a href="{{ route('admindashboard') }}" class='sidebar-link '>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a href="{{ route('adminsantri') }}" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Data Santri</span>
                </a>
            </li>
        
            <li class="sidebar-item ">
                <a href="{{ route('adminpelanggaran') }}" class='sidebar-link'>
                    <i class="bi bi-exclamation-triangle"></i>
                    <span>Pelanggaran</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="{{ route('adminprestasi') }}" class='sidebar-link'>
                    <i class="bi bi-trophy"></i>
                    <span>Prestasi</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="{{ route('adminmutabaah') }}" class='sidebar-link'>
                    <i class="bi bi-calendar"></i>
                    <span>Mutabaah Santri</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="{{ route('adminnilai') }}" class='sidebar-link'>
                    <i class="bi bi-paper fill"></i>
                    <span>Nilai Santri</span>
                </a>
            </li>
        </ul>
    </div>
    </div>
</div>