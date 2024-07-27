@extends('../../include/adminsidebar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIB - Dashboard</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="{{ asset('template/dist/assets') }}/extensions/filepond/filepond.css">
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css">
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
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
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
                <div class="d-flex justify-content-between mb-3">
                    <h3>Tambah Data Santri</h3>
                    <a href="{{ route('adminsantri') }}" class="btn btn-secondary me-1 mb-1">Kembali</a>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('adminstoretambah') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row match-height">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="username">Username</label>
                                                                <input type="text" id="username"
                                                                    class="form-control" placeholder="Username"
                                                                    name="username">
                                                                @error('nama_santri')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="nama_lengkap">Nama
                                                                    Lengkap</label>
                                                                <input type="text" id="nama_lengkap"
                                                                    class="form-control" placeholder="Nama Lengkap"
                                                                    name="nama_lengkap">
                                                                @error('nama_lengkap')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" id="email"
                                                                    class="form-control" placeholder="Email"
                                                                    name="email">
                                                                @error('email')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" id="password"
                                                                    class="form-control" placeholder="Password"
                                                                    name="password">
                                                                @error('password')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label for="Kelas">Tingkatan/Kelas</label>
                                                            <div class="input-group mb-3">
                                                                <select class="form-select" id="Kelas"
                                                                    name="angkatan_santri">
                                                                    <option hidden>Pilih Kelas...</option>
                                                                    <option value="Mustawa 1">Mustawa 1</option>
                                                                    <option value="Mustawa 2">Mustawa 2</option>
                                                                    <option value="Mustawa 3">Mustawa 3</option>
                                                                    <option value="Khidmat">Khidmat</option>
                                                                </select>
                                                                @error('angkatan_santri')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label for="thn_angkatan">Tahun Angkatan</label>
                                                            <input name="thn_angkatan" id="thn_angkatan"
                                                                type="number"
                                                                class="form-control flatpickr-no-config"
                                                                placeholder="Tahun Angkatan">
                                                            @error('thn_angkatan')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                                            <input name="tgllahir_santri" id="tgl_lahir"
                                                                type="date"
                                                                class="form-control flatpickr-no-config"
                                                                placeholder="Select date..">
                                                            @error('tgllahir_santri')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat
                                                                    Lengkap</label>
                                                                <input type="text" id="alamat"
                                                                    class="form-control" name="alamat_santri"
                                                                    placeholder="Alamat Lengkap">
                                                                @error('alamat_santri')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label for="basicInput">Jenis Kelamin
                                                                Santri</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jk_santri" id="genderI" value="Ikhwan">
                                                                @error('jk_santri')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                <label class="form-check-label" for="genderI">
                                                                    Ikhwan
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jk_santri" id="genderA" value="Akhwat">
                                                                @error('jk_santri')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                <label class="form-check-label" for="genderA">
                                                                    Akhwat
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="mb-3 card">
                                                                <label for="formFile">Foto</label>
                                                                <input type="file" id="formFile"
                                                                    name="photo_santri" class="image-crop-filepond"
                                                                    image-crop-aspect-ratio="1:1">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js">
    </script>
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js">
    </script>
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js">
    </script>
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js">
    </script>
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js">
    </script>
    <script
        src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js">
    </script>
    <script src="{{ asset('template/dist/assets') }}/extensions/filepond/filepond.js"></script>
    <script src="{{ asset('template/dist/assets') }}/extensions/toastify-js/src/toastify.js"></script>
    <script src="{{ asset('template/dist/assets') }}/static/js/pages/filepond.js"></script>
    <script>
        @if (session('status'))
            Toastify({
                text: "{{ session('status') }}",
                duration: 3000, // 3 seconds
                gravity: "bottom", // 'top' or 'bottom'
                position: "right", // 'left', 'center' or 'right'
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true, // Prevents dismissing of toast on hover
            }).showToast();
        @endif
    </script>
</body>

</html>
