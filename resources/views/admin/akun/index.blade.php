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
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">
                <div class="table-card prestasi-card-container">
                    <div class="text-center rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Data Akun</h3>
                            <a class="btn btn-md btn-primary" href="{{ route('adminakun.create') }}">
                                <i class="fas fa-plus-circle"></i> Add New Data
                            </a>
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
                                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin
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
                    <div class="card-body mt-3">
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
                                @foreach ($users as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning rounded-3 p-2 me-1"
                                                href="{{ route('adminakun.edit', $item->id) }}">
                                                <i class="fa fa-solid fa-pen"></i>
                                            </a>
                                            <form action="{{ route('adminakun.delete', $item->id) }}" method="POST"
                                                style="display: inline;"
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
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->appends(request()->query())->links() }}
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
