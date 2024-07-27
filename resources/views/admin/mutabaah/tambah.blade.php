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
                <li class="sidebar-item">
                    <a href="{{ route('adminprestasi') }}" class='sidebar-link'>
                        <i class="bi bi-trophy"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="sidebar-item active">
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
                <div class="d-flex justify-content-between">
                    @foreach ($users as $item)
                        <div class="page-heading">
                            <h3>Tambah Data Mutabaah {{ $item->nama_lengkap }}</h3>
                        </div>
                        <div class="">
                            <a href="{{ route('adminmutabaahdetail', $item->id) }}" type="reset"
                                class="btn btn-secondary me-1 mb-1">Kembali</a>
                        </div>
                    @endforeach
                </div>
                <div class="page-content">
                    @if ($errors->has('tanggal'))
                        <div class="alert alert-danger">
                            {{ $errors->first('tanggal') }}
                        </div>
                    @endif
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('storeMutabaah') }}" enctype="multipart/form-data">
                                @csrf
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="santri_id">Nama Santri</label>
                                                                    <input disabled name="name" type="text"
                                                                        id=""
                                                                        @foreach ($users as $item)
                                                                        value="{{ $item->nama_lengkap }}" @endforeach
                                                                        class="form-control">
                                                                    <input name="user_id" type="text"
                                                                        @foreach ($users as $item)
                                                                        value="{{ $item->id }}" @endforeach
                                                                        class="visually-hidden">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <label for="basicInput">Tanggal</label>
                                                                <input name="tanggal" id="tanggal" type="date"
                                                                    class="form-control flatpickr-no-config"
                                                                    placeholder="Select date..">
                                                            </div>

                                                            <div class="col-md-6 mt-3">
                                                                <div class="mb-3">
                                                                    <h5 class="mb-3">
                                                                        Sholat Berjamaah</h5>
                                                                    <div class="col-md-6 col-12">

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="shubuh"
                                                                                id="flexCheckDefault">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault">
                                                                                Shubuh
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="dzuhur"
                                                                                id="flexCheckDefault2">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault2">
                                                                                Dzuhur
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ashar"
                                                                                id="flexCheckDefault3">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault3">
                                                                                Ashar
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="maghrib"
                                                                                id="flexCheckDefault4">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault4">
                                                                                Maghrib
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="isya"
                                                                                id="flexCheckDefault5">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault5">
                                                                                Isya
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12 my-3">
                                                                <div class="col-md-12">
                                                                    <h5>Sunnah</h5>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label
                                                                                for="first-name-column">Tilawah</label>
                                                                            <input type="text" class="form-control"
                                                                                name="tilawah" id="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="alMulk"
                                                                                id="alMulk">
                                                                            <label for="alMulk" class="px-2">Al -
                                                                                Mulk
                                                                                Sebelum Tidur</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="solawat"
                                                                                id="solawat">
                                                                            <label for="solawat"
                                                                                class="px-2">Membaca
                                                                                Sholawat</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="alkahfi"
                                                                                id="alkahfi">
                                                                            <label for="alkahfi" class="px-2">Al -
                                                                                Kahfi(Jum'at)</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="tahajud"
                                                                                id="tahajud">
                                                                            <label for="tahajud"
                                                                                class="px-2">Tahajud</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="dhuha"
                                                                                id="dhuha">
                                                                            <label for="dhuha"
                                                                                class="px-2">Dhuha</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rs"
                                                                                id="rs">
                                                                            <label for="rs"
                                                                                class="px-2">R.S</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rd"
                                                                                id="rd">
                                                                            <label for="rd"
                                                                                class="px-2">R.D</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rm"
                                                                                id="rm">
                                                                            <label for="rm"
                                                                                class="px-2">R.M</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ri"
                                                                                id="ri">
                                                                            <label for="ri"
                                                                                class="px-2">R.I</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="col-md-12">
                                                                    <h5>Dzikir</h5>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="pagi"
                                                                            id="pagi">
                                                                        <label for="pagi"
                                                                            class="px-2">Pagi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="petang"
                                                                            id="petang">
                                                                        <label for="petang"
                                                                            class="px-2">Petang</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="col-md-12">
                                                                    <h5>Sahur & Shaum</h5>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="senin"
                                                                            id="senin">
                                                                        <label for="senin"
                                                                            class="px-2">Senin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="kamis"
                                                                            id="kamis">
                                                                        <label for="kamis"
                                                                            class="px-2">Kamis</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <div class="col-md-12">
                                                                    <h5>Work Out</h5>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="sitUp"
                                                                            id="sitUp">
                                                                        <label for="sitUp" class="px-2">Sit Up
                                                                            100</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="pushUp"
                                                                            id="pushUp">
                                                                        <label for="pushUp" class="px-2">Push Up
                                                                            100</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="run"
                                                                            id="run">
                                                                        <label for="run"
                                                                            class="px-2">Run</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <h5>Muamalah & Ihsan</h5>
                                                            </div>
                                                            <div class="col-md-6 col-12 mb-3">
                                                                <label for="basicInput">Reading Book</label>
                                                                <input name="reading" id="reading" type="text"
                                                                    class="form-control flatpickr-no-config">
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="3s" id="3s">
                                                                    <label for="3s" class="px-2">3S</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="mendoakanOrangTua"
                                                                        id="mendoakanOrangTua">
                                                                    <label for="mendoakanOrangTua"
                                                                        class="px-2">Mendoakan Orang Tua</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="bersyukur" id="bersyukur">
                                                                    <label for="bersyukur" class="px-2">Bersyukur
                                                                        Kepada Allah</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="mendoakanOrangLain"
                                                                        id="mendoakanOrangLain">
                                                                    <label for="mendoakanOrangLain"
                                                                        class="px-2">Mendoakan Orang Lain</label>
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
