@extends('../../include/sidebar')
@include('include.bagianatas')

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
                <li class="sidebar-item active">
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
                <li class="sidebar-item ">
                    <a href="{{ route('nilai') }}" class='sidebar-link'>
                        <i class="bi bi-award"></i>
                        <span>Nilai Santri</span>
                    </a>
                </li>
            </ul>
        @endsection
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">
                <div class="table-card prestasi-card-container">
                    <div class=" text-center rounded mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>Pelanggaran Santri {{ Auth::user()->nama_lengkap }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table text-start align-right table-bordered table-hover mb-0 ">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pelanggaran</th>
                                    <th scope="col">Kategori pelanggaran</th>
                                    <th scope="col">Keterangan pelanggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $item)
                                    <tr id="pelanggaran-list">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tglpelanggaran }}</td>
                                        <td>{{ $item->nama_pelanggaran }}</td>
                                        <td>{{ $item->kategori_pelanggaran }}</td>
                                        <td>{{ $item->deskripsi_pelanggaran }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('include.bagianbawah')
    </div>
</body>

</html>
