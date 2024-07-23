@extends('../../include/adminsidebar')
@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        @section('sidebar-menu')
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ route('admindashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('adminsantri') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Data Santri</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('adminpelanggaran') }}" class='sidebar-link'>
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('adminprestasi') }}" class='sidebar-link'>
                        <i class="bi bi-trophy"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="sidebar-item active">
                    <a href="{{ route('adminmutabaah') }}" class='sidebar-link'>
                        <i class="bi bi-calendar"></i>
                        <span>Mutaba'ah Santri</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('adminnilai') }}" class='sidebar-link'>
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
                    <h3 class="mb-3">Data Mutabaah Santri</h3>
                    <div class="card-body mb-5">
                        <!-- Updated form for auto-filtering -->
                        <form method="GET" action="{{ route('adminmutabaah') }}" id="filterForm">
                            <div class="mb-3">
                                <div class="d-flex justify-content-end gap-2">
                                    <div class="">
                                        <input type="text" name="search_name" id="search_name" class="form-control"
                                            placeholder="Cari Nama Santri" value="{{ request('search_name') }}">
                                    </div>
                                    <div class="">
                                        <select name="gender" id="gender" class="form-select pe-5">
                                            <option value="">Semua Gender</option>
                                            <option value="Ikhwan"
                                                {{ request('gender') == 'Ikhwan' ? 'selected' : '' }}>
                                                Ikhwan</option>
                                            <option value="Akhwat"
                                                {{ request('gender') == 'Akhwat' ? 'selected' : '' }}>
                                                Akhwat</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <select name="angkatan" id="angkatan" class="form-select pe-5">
                                            <option value="">Semua Angkatan</option>
                                            @foreach ($angkatanList as $angkatan)
                                                <option value="{{ $angkatan }}"
                                                    {{ request('angkatan') == $angkatan ? 'selected' : '' }}>
                                                    {{ $angkatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="overflow-y-hidden">
                            <table class="table text-start align-right table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white text-center">
                                        <th scope="col" width="5%">No</th>
                                        <th scope="col">Nama Santri</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col" width="10%" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($santri as $item)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $item->nama_lengkap }}</td>
                                            <td class="text-center">{{ $item->jk_santri }}</td>
                                            <td class="text-center">{{ $item->angkatan_santri }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary"
                                                    href="{{ route('adminmutabaahdetail', $item->user_id) }}">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (!$dataFound)
                                        <tr>
                                            <td colspan="5" class="text-center">Nama Tidak Terdaftar</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('include.bagianbawah')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('filterForm');
            const inputs = form.querySelectorAll('input, select');

            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    form.submit();
                });

                input.addEventListener('change', function() {
                    form.submit();
                });
            });
        });
    </script>
</body>

</html>
