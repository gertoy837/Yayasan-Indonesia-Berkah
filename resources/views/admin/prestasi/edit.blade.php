@extends('../../include/adminsidebar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
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
                <div class="page-heading">
                    <div class="d-flex justify-content-between">
                        <h3>Edit Data Prestasi Santri</h3>
                        <a href="{{ route('adminprestasi') }}" class="btn btn-secondary me-1 mb-1">Kembali</a>
                    </div>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('adminupdateprestasi', $data['id']) }}">
                                @method('PUT')
                                @csrf
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Edit data prestasi santri</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="santri_id">Nama Santri</label>
                                                                    <select name="santri_id" id="santri_id"
                                                                        class="choices form-select form-control">
                                                                        @foreach ($users as $item)
                                                                            <option value="{{ $item->id }}"
                                                                                {{ $item->id == $data->user_id ? 'selected' : '' }}>
                                                                                {{ $item->nama_lengkap }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <label for="kategori_prestasi">Kategori Prestasi</label>
                                                                <select class="choices form-select"
                                                                    name="kategori_prestasi" id="kategori_prestasi">
                                                                    <option value="Akademik"
                                                                        {{ $data->kategori_prestasi == 'Akademik' ? 'selected' : '' }}>
                                                                        Akademik</option>
                                                                    <option value="Olahraga"
                                                                        {{ $data->kategori_prestasi == 'Olahraga' ? 'selected' : '' }}>
                                                                        Olahraga</option>
                                                                    <option value="Seni dan Budaya"
                                                                        {{ $data->kategori_prestasi == 'Seni dan Budaya' ? 'selected' : '' }}>
                                                                        Seni dan Budaya</option>
                                                                    <option value="Kebersihan"
                                                                        {{ $data->kategori_prestasi == 'Kebersihan' ? 'selected' : '' }}>
                                                                        Kebersihan</option>
                                                                    <option value="Public Speaking"
                                                                        {{ $data->kategori_prestasi == 'Public Speaking' ? 'selected' : '' }}>
                                                                        Public Speaking</option>
                                                                    <option value="Ekstrakurikuler"
                                                                        {{ $data->kategori_prestasi == 'Ekstrakurikuler' ? 'selected' : '' }}>
                                                                        Ekstrakurikuler</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="nama_prestasi">Nama Prestasi</label>
                                                                    <input type="text" id="nama_prestasi"
                                                                        class="form-control" placeholder="Nama Prestasi"
                                                                        name="nama_prestasi"
                                                                        value="{{ $data->nama_prestasi }}">
                                                                    @error('nama_prestasi')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="keterangan_prestasi">Keterangan
                                                                        Prestasi</label>
                                                                    <input type="text" id="keterangan_prestasi"
                                                                        class="form-control"
                                                                        placeholder="Keterangan Prestasi"
                                                                        name="keterangan_prestasi"
                                                                        value="{{ $data->keterangan_prestasi }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <label for="tglprestasi">Tanggal</label>
                                                                <input name="tglprestasi" id="tglprestasi"
                                                                    type="date"
                                                                    class="form-control flatpickr-no-config"
                                                                    placeholder="Select date.."
                                                                    value="{{ $data->tglprestasi }}">
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
