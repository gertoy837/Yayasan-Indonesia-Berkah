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
                {{-- <li class="sidebar-item ">
                    <a href="{{ route('santri') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Data Santri</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="sidebar-item active">
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
                            <h3 class="mb-0">Prestasi Santri {{Auth::user()->nama_lengkap}}</h3>
                            {{-- <a class="btn btn-md btn-primary" href="{{route('tambahprestasi')}}"><i class="fas fa-plus-circle"></i> Add New Data</a>   --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table text-start align-right table-bordered table-hover mb-0 ">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">No</th>
                                    {{-- <th scope="col">Nama Santri</th> --}}
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Prestasi</th>
                                    <th scope="col">Kategori Prestasi</th>
                                    <th scope="col">Keterangan Prestasi</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $item)
                                    <tr id="prestasi-list">
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $item->user->nama_lengkap }}</td> --}}
                                        <td>{{ $item->tglprestasi }}</td>
                                        <td>{{ $item->nama_prestasi }}</td>
                                        <td>{{ $item->kategori_prestasi }}</td>
                                        <td>{{ $item->keterangan_prestasi }}</td>
                                        {{-- <td class="text-center">
                                            <a class="btn btn-warning rounded-pill m-2"
                                                href="{{ route('editprestasi', $item->id) }}"><i
                                                    class="fa fa-solid fa-pen"></i></a>
                                            <a class="btn btn-light rounded-pill m-2"
                                                href="{{ route('hapusprestasi', $item->id) }}"
                                                onclick="return confirm('Mau Dihapus?!')"><i
                                                    class="fa fa-solid fa-trash"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
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
