@extends('../../include/adminsidebar')

<head>
    @include('include.bagianatas')
    <script>
        function autoSubmit() {
            document.getElementById('filter-form').submit();
        }

        function clearSearch() {
            document.getElementById('search_name').value = '';
            document.getElementById('filter_gender').value = '';
            document.getElementById('filter_angkatan').value = '';
            document.getElementById('filter_tahun_angkatan').value = '';
            autoSubmit();
        }

        // Add this new function for debounce
        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        // Add event listener for name search input
        document.addEventListener('DOMContentLoaded', function() {
            const searchNameInput = document.getElementById('search_name');
            searchNameInput.addEventListener('input', debounce(function() {
                autoSubmit();
            }, 300)); // 300ms delay
        });
    </script>
</head>

<body>
    <script src="{{ asset('template/dist/assets/static/js/initTheme.js') }}"></script>
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
                <li class="sidebar-item active">
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
                <li class="sidebar-item ">
                    <a href="{{ route('donatur.nilai') }}" class='sidebar-link'>
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
                    <div class="text-center rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Data Santri</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">
                            <form id="filter-form" action="{{ route('donatur.santri') }}" method="GET" class="mb-3">
                                <div class="d-flex justify-content-end gap-2">
                                    <div class="">
                                        <input type="text" name="search_name" id="search_name" class="form-control"
                                            placeholder="Search by name" value="{{ request('search_name') }}">
                                    </div>
                                    <div class="">
                                        <select name="filter_gender" id="filter_gender" class="form-control"
                                            onchange="autoSubmit()">
                                            <option value="">All Genders</option>
                                            <option value="Ikhwan"
                                                {{ request('filter_gender') == 'Ikhwan' ? 'selected' : '' }}>Ikhwan
                                            </option>
                                            <option value="Akhwat"
                                                {{ request('filter_gender') == 'Akhwat' ? 'selected' : '' }}>Akhwat
                                            </option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <select name="filter_angkatan" id="filter_angkatan" class="form-control"
                                            onchange="autoSubmit()">
                                            <option value="">All Angkatan</option>
                                            @foreach ($angkatans as $angkatan)
                                                <option value="{{ $angkatan }}"
                                                    {{ request('filter_angkatan') == $angkatan ? 'selected' : '' }}>
                                                    {{ $angkatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <select name="filter_tahun_angkatan" id="filter_tahun_angkatan"
                                            class="form-control" onchange="autoSubmit()">
                                            <option value="">All Tahun Angkatan</option>
                                            @foreach ($tahun_angkatans as $tahun)
                                                <option value="{{ $tahun }}"
                                                    {{ request('filter_tahun_angkatan') == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="clearSearch()">Clear</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table text-start align-right table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col" class="text-center" width="5%">No</th>
                                        <th scope="col" class="text-center">Nama Santri</th>
                                        <th scope="col" class="text-center">Jenis Kelamin</th>
                                        <th scope="col" class="text-center">Angkatan</th>
                                        <th scope="col" class="text-center">Tahun</th>
                                        <th scope="col" class="text-center">Tanggal Lahir</th>
                                        <th scope="col" class="text-center">Alamat</th>
                                        <th scope="col" class="text-center">Foto</th>
                                    </tr>
                                </thead>
                                <tbody id="pelanggaran-list">
                                    @php
                                        $start = ($users->currentPage() - 1) * $users->perPage() + 1;
                                    @endphp
                                    @foreach ($users as $item)
                                        <tr>
                                            <td class="text-center">{{ $start + $loop->index }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ !empty($item->santri->jk_santri) ? $item->santri->jk_santri : '' }}
                                            </td>
                                            <td>{{ !empty($item->santri->angkatan_santri) ? $item->santri->angkatan_santri : '' }}
                                            </td>
                                            <td>{{ !empty($item->santri->tahun_angkatan_santri) ? $item->santri->tahun_angkatan_santri : '' }}
                                            </td>
                                            <td>{{ !empty($item->santri->tgllahir_santri) ? $item->santri->tgllahir_santri : '' }}
                                            </td>
                                            <td>{{ !empty($item->santri->alamat_santri) ? $item->santri->alamat_santri : '' }}
                                            </td>
                                            @if (!empty($item->santri->photo_santri) ? $item->santri->photo_santri : '')
                                                <td class="avatar avatar-xl p-0 my-2 ml-3 me-1">
                                                    <img
                                                        src="{{ asset('storage') }}/images/{{ $item->santri->photo_santri }}">
                                                </td>
                                            @else
                                                <td class="avatar avatar-xl p-0 my-2 ml-3 me-1">
                                                    @if (!empty($item->santri->jk_santri) ? $item->santri->jk_santri == 'Ikhwan' : '')
                                                        <img src="{{ asset('storage') }}/avatars/default_ikhwan.jpg">
                                                    @else
                                                        <img src="{{ asset('storage') }}/avatars/default_akhwat.jpg">
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('include.bagianbawah')
    </div>
</body>

</html>
