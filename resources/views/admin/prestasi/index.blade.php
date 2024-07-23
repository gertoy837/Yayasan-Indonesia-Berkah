@extends('../../include/adminsidebar')

<head>
    @include('include.bagianatas')
    <script>
        function autoSubmit() {
            document.getElementById('filter-form').submit();
        }

        function clearSearch() {
            document.getElementById('search_name').value = '';
            autoSubmit(); // Submit form after clearing the input
        }
    </script>
</head>

<body>
    <script src="{{ asset('template/dist/assets/static/js/initTheme.js') }}"></script>
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
                <li class="sidebar-item active">
                    <a href="{{ route('adminprestasi') }}" class='sidebar-link'>
                        <i class="bi bi-trophy"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="sidebar-item ">
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
                @include('include.modal')
                <div class="table-card prestasi-card-container">
                    <div class="text-center rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Prestasi Santri</h3>
                            <a class="btn btn-md btn-primary" style="margin-bottom:20px"
                                href="{{ route('admintambahprestasi') }}">
                                <i class="fas fa-plus-circle"></i> Add New Data
                            </a>
                        </div>
                        <div class="">
                            <form id="filter-form" action="{{ route('adminprestasi') }}"
                                class="d-flex justify-content-end gap-2" method="GET">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="search_name" id="search_name"
                                                class="form-control" value="{{ request('search_name') }}"
                                                placeholder="Masukkan nama santri..." oninput="autoSubmit();">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    onclick="clearSearch();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="gender" id="filter_gender" class="form-control"
                                        onchange="autoSubmit();">
                                        <option value="" hidden>Pilih gender</option>
                                        <option value="">Semua</option>
                                        <option value="ikhwan" {{ request('gender') == 'ikhwan' ? 'selected' : '' }}>
                                            Ikhwan</option>
                                        <option value="akhwat" {{ request('gender') == 'akhwat' ? 'selected' : '' }}>
                                            Akhwat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="angkatan" id="filter_angkatan" class="form-control"
                                        onchange="autoSubmit();">
                                        <option value="" hidden>Pilih angkatan</option>
                                        <option value="">Semua</option>
                                        @foreach ($angkatanList as $angkatan)
                                            <option value="{{ $angkatan }}"
                                                {{ request('angkatan') == $angkatan ? 'selected' : '' }}>
                                                {{ $angkatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table text-start align-right table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Santri</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Prestasi</th>
                                    <th scope="col">Kategori Prestasi</th>
                                    <th scope="col">Keterangan Prestasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($query as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->nama_lengkap }}</td>
                                        <td>{{ $item->tglprestasi }}</td>
                                        <td>{{ $item->nama_prestasi }}</td>
                                        <td>{{ $item->kategori_prestasi }}</td>
                                        <td>{{ $item->keterangan_prestasi }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning rounded-pill m-2"
                                                href="{{ route('admineditprestasi', $item->id) }}">
                                                <i class="fa fa-solid fa-pen"></i>
                                            </a>
                                            <a class="btn btn-light rounded-pill m-2"
                                                href="{{ route('adminhapusprestasi', $item->id) }}"
                                                onclick="return confirm('Mau Dihapus?!')">
                                                <i class="fa fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.bagianbawah')
</body>

</html>
