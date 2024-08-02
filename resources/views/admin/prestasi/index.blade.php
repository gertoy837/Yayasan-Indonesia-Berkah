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
                    <a href="{{ route('adminakun') }}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Data Akun</span>
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

        {{-- Modal Import --}}
        <div class="form-group">
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Import Data Prestasi</h4>
                            <a href="{{ asset('template-import/template_data_prestasi.xlsx') }}"
                                class="btn btn-outline-info">
                                <i class="fa fa-download"></i> Download Template Excel
                            </a>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.import.prestasi') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <input type="file" name="file" class="basic-filepond">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Kirim</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">
                <div class="table-card prestasi-card-container">
                    <div class="text-center rounded">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h3 class="">Prestasi Santri</h3>
                            <div class="">
                                <button type="button" class="btn btn-success me-1" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Import Data
                                </button>
                                <a class="btn btn-md btn-primary" href="{{ route('admintambahprestasi') }}">
                                    <i class="fas fa-plus-circle"></i> Add New Data
                                </a>
                            </div>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-start align-right table-bordered table-hover mb-0">
                                    <thead>
                                        <tr class="text-white">
                                            <th scope="col">No</th>
                                            <th scope="col" style="white-space: nowrap;" class="text-center">Nama Santri</th>
                                            <th scope="col" style="white-space: nowrap;" class="text-center">Tanggal</th>
                                            <th scope="col" style="white-space: nowrap;" class="text-center">Nama Prestasi</th>
                                            <th scope="col" style="white-space: nowrap;" class="text-center">Kategori Prestasi</th>
                                            <th scope="col" style="white-space: nowrap;" class="text-center">Keterangan Prestasi</th>
                                            <th scope="col" style="white-space: nowrap;" class="text-center" width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $start = ($query->currentPage() - 1) * $query->perPage() + 1;
                                        @endphp
                                        @forelse ($query as $item)
                                            <tr>
                                                <td>{{ $start + $loop->index }}</td>
                                                <td style="white-space: nowrap">{{ $item->user->nama_lengkap }}</td>
                                                <td style="white-space: nowrap">{{ $item->tglprestasi }}</td>
                                                <td style="white-space: nowrap">{{ $item->nama_prestasi }}</td>
                                                <td style="white-space: nowrap">{{ $item->kategori_prestasi }}</td>
                                                <td style="white-space: nowrap">{{ $item->keterangan_prestasi }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning rounded-2 m-1"
                                                        href="{{ route('admineditprestasi', $item->id) }}">
                                                        <i class="fa fa-solid fa-pen"></i>
                                                    </a>
                                                    <form action="{{ route('adminhapusprestasi', $item->id) }}"
                                                        method="POST" style="display: inline;"
                                                        onsubmit="return confirm('Mau Dihapus?!')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light rounded-2 m-1">
                                                            <i class="fa fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
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
                        <div class="card-footer">
                            {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.bagianbawah')
</body>

</html>
