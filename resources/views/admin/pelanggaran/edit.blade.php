@extends('../../include/adminsidebar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
</head>

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
                <li class="sidebar-item active">
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
                <div class="page-heading">
                    <div class="d-flex justify-content-between">
                        <h3>Edit Data Pelanggaran Santri</h3>
                        <a href="{{ route('adminpelanggaran') }}" class="btn btn-secondary me-1 mb-1">Kembali</a>
                    </div>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('adminupdatepelanggaran', $datas->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Edit Data Pelanggaran Santri</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="santri_id">Nama Santri</label>
                                                                    <select name="santri_id" id="santri_id"
                                                                        class="form-control" aria-label="Disabled"
                                                                        disabled>
                                                                        <option value="{{ $datas->id }}" selected>
                                                                            {{ $datas->user->nama_lengkap }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-3">
                                                                    <label for="first-name-column">Jenis
                                                                        Pelanggaran</label>
                                                                    <input type="text" id="first-name-column"
                                                                        class="form-control" placeholder="Nama datas"
                                                                        name="nama_pelanggaran"
                                                                        value="{{ $datas->nama_pelanggaran }}">
                                                                    @error('nama_pelanggaran')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-3">
                                                                    <label for="first-name-column">Kategori
                                                                        Pelanggaran</label>
                                                                    <select class="form-select" id="inputGroupSelect01"
                                                                        name="kategori_pelanggaran">
                                                                        <option value="" disabled>Pilih...
                                                                        </option>
                                                                        <option value="Ringan"
                                                                            {{ $datas->kategori_pelanggaran == 'Ringan' ? 'selected' : '' }}>
                                                                            Ringan</option>
                                                                        <option value="Sedang"
                                                                            {{ $datas->kategori_pelanggaran == 'Sedang' ? 'selected' : '' }}>
                                                                            Sedang</option>
                                                                        <option value="Berat"
                                                                            {{ $datas->kategori_pelanggaran == 'Berat' ? 'selected' : '' }}>
                                                                            Berat</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Keterangan
                                                                        Pelanggaran</label>
                                                                    <input type="text" id="first-name-column"
                                                                        class="form-control"
                                                                        placeholder="Keterangan Pelanggaran"
                                                                        name="deskripsi_pelanggaran"
                                                                        value="{{ $datas->deskripsi_pelanggaran }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <label for="basicInput">Tanggal</label>
                                                                <input name="tglpelanggaran" id="tglpelanggaran"
                                                                    type="date"
                                                                    class="form-control flatpickr-no-config"
                                                                    placeholder="Select date.."
                                                                    value="{{ $datas->tglpelanggaran }}">
                                                            </div>

                                                            <div class="col-md-6 col-12 align-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary float-end me-1 mb-1">Kirim</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('template/dist/assets') }}/static/js/components/dark.js"></script>
    <script src="{{ asset('template/dist/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>
</body>

</html>
