@extends('../../include/adminsidebar')

<head>
    @include('include.bagianatas')
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
                <li class="sidebar-item active">
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
                            <h4 class="modal-title" id="myModalLabel33">Import Data Akun </h4>
                            <a href="{{ asset('template-import/template_data_akun.xlsx') }}" class="btn btn-outline-info">
                                <i class="fa fa-download"></i> Download Template Excel
                            </a>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.import.akun') }}" enctype="multipart/form-data">
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Data Akun</h3>
                            <div class="">
                                <button type="button" class="btn btn-success me-1" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Import Data
                                </button>
                                <a class="btn btn-md btn-primary" href="{{ route('adminakun.create') }}">
                                    <i class="fas fa-plus-circle"></i> Add New Data
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('adminakun') }}" method="GET" id="searchForm" class="mt-3">
                            <div class="d-flex justify-content-end gap-2">
                                <div class="">
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                        placeholder="Cari Nama Lengkap" value="{{ request('nama_lengkap') }}">
                                </div>
                                <div class="">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Semua Role</option>
                                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="santri" {{ request('role') == 'santri' ? 'selected' : '' }}>
                                            Santri</option>
                                        <option value="donatur" {{ request('role') == 'donatur' ? 'selected' : '' }}>
                                            Donatur</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table text-start align-right table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col" class="text-center" width="5%">No</th>
                                        <th scope="col" class="text-center">
                                            <a
                                                href="{{ route('adminakun', ['sort' => 'username', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                                Username
                                            </a>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <a
                                                href="{{ route('adminakun', ['sort' => 'nama_lengkap', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                                Nama Lengkap
                                            </a>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <a
                                                href="{{ route('adminakun', ['sort' => 'email', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                                Email
                                            </a>
                                        </th>
                                        <th scope="col" class="text-center">
                                            <a
                                                href="{{ route('adminakun', ['sort' => 'role', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                                Role
                                            </a>
                                        </th>
                                        <th scope="col" class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pelanggaran-list">
                                    @php
                                        $start = ($users->currentPage() - 1) * $users->perPage() + 1;
                                    @endphp
                                    @foreach ($users as $item)
                                        <tr>
                                            <td class="text-center">{{ $start + $loop->index }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-warning rounded-3 p-2 me-1"
                                                    href="{{ route('adminakun.edit', $item->id) }}">
                                                    <i class="fa fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('adminakun.delete', $item->id) }}"
                                                    method="POST" style="display: inline;"
                                                    onsubmit="return confirm('Mau Dihapus?!')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-3 p-2">
                                                        <i class="fa fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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

    <script>
        document.getElementById('nama_lengkap').addEventListener('input', function() {
            document.getElementById('searchForm').submit();
        });

        document.getElementById('role').addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
    </script>
</body>

</html>
