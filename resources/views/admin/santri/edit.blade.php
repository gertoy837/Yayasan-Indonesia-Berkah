@extends('../../include/adminsidebar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIB - Dashboard</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js "></script>
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
                <li class="sidebar-item active">
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
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->username }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">User</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('template/dist') }}/assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end x-slot" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ Auth::user()->username }}</h6>
                                    </li>
                                    <li><x-dropdown-link :href="route('profile.edit')" class="dropdown-item"><i
                                                class="icon-mid bi bi-person me-2"></i>
                                            {{ __('Profile') }}
                                        </x-dropdown-link></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="#" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <h3>Edit Data Santri</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('adminupdatesantri', $edit->id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Edit Data Santri</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form">
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input value="{{ $edit->user->username }}"
                                                                            type="text" id="username"
                                                                            class="form-control"
                                                                            placeholder="Username" name="username">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="first-name-column">Nama
                                                                            Lengkap</label>
                                                                        <input value="{{ $edit->user->nama_lengkap }}"
                                                                            type="text" id="first-name-column"
                                                                            class="form-control"
                                                                            placeholder="Nama Lengkap"
                                                                            name="nama_santri">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input value="{{ $edit->user->email }}"
                                                                            type="text" id="email"
                                                                            class="form-control" placeholder="Email"
                                                                            name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" id="password"
                                                                            class="form-control"
                                                                            placeholder="Password" name="password">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label>Tingkatan/Kelas</label>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select"
                                                                            id="inputGroupSelect01"
                                                                            name="angkatan_santri">
                                                                            <option>Pilih...</option>
                                                                            <option value="Mustawa 1"
                                                                                {{ $edit->angkatan_santri === 'Mustawa 1' ? 'selected' : '' }}>
                                                                                Mustawa 1</option>
                                                                            <option value="Mustawa 2"
                                                                                {{ $edit->angkatan_santri === 'Mustawa 2' ? 'selected' : '' }}>
                                                                                Mustawa 2</option>
                                                                            <option value="Mustawa 3"
                                                                                {{ $edit->angkatan_santri === 'Mustawa 3' ? 'selected' : '' }}>
                                                                                Mustawa 3</option>
                                                                            <option value="Khidmat"
                                                                                {{ $edit->angkatan_santri === 'Khidmat' ? 'selected' : '' }}>
                                                                                Khidmat</option>
                                                                        </select>
                                                                        <label class="input-group-text"
                                                                            for="inputGroupSelect01">Tingkatan</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label for="thn_angkatan">Tahun Angkatan</label>
                                                                    <input name="thn_angkatan" id="thn_angkatan"
                                                                        type="number"
                                                                        value="{{ $edit->tahun_angkatan_santri }}"
                                                                        class="form-control flatpickr-no-config"
                                                                        placeholder="Tahun Angkatan">
                                                                    @error('thn_angkatan')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label for="basicInput">Tanggal Lahir</label>
                                                                    <input name="tgllahir_santri" id="tgllahir_santri"
                                                                        type="date"
                                                                        value="{{ $edit->tgllahir_santri }}"
                                                                        class="form-control flatpickr-no-config"
                                                                        placeholder="Select date..">
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="company-column">ALamat
                                                                            Lengkap</label>
                                                                        <input type="text" id="company-column"
                                                                            class="form-control" name="alamat_santri"
                                                                            placeholder="Alamat Lengkap"
                                                                            value="{{ $edit['alamat_santri'] }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label for="basicInput">Jenis Kelamin
                                                                        Santri</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jk_santri" id="flexRadioDefault1"
                                                                            value="Ikhwan"
                                                                            {{ $edit->jk_santri === 'Ikhwan' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            Ikhwan
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jk_santri" id="flexRadioDefault1"
                                                                            value="Akhwat"
                                                                            {{ $edit->jk_santri === 'Akhwat' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            Akhwat
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="mb-3">
                                                                        <label for="formFile" class="form-label">Photo
                                                                            Santri</label>
                                                                        <input class="form-control"
                                                                            name="photo_santri" type="file"
                                                                            id="formFile">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                                    <a href="{{ route('adminsantri') }}"
                                                                        type="reset"
                                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                                </div>
                                                            </div>
                                                        </form>
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
