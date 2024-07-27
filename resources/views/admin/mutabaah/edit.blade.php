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
                    <div class="page-heading">
                        <h3>Edit Mutabaah {{ $users->nama_lengkap }}</h3>
                    </div>
                    <div class="">
                        <a href="{{ route('adminmutabaahdetail', $users->id) }}" type="reset"
                            class="btn btn-secondary me-1 mb-1">Kembali</a>
                    </div>
                </div>
                <div class="page-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <section class="section">
                        <div class="card">
                            <form action="{{ route('updateMutabaah', $mutabaah->id) }}" method="POST">
                                @csrf
                                @method('PUT')
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
                                                                        value="{{ $users->nama_lengkap }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <label for="basicInput">Tanggal</label>
                                                                <input name="tanggal" id="tanggal" type="date"
                                                                    class="form-control flatpickr-no-config"
                                                                    value="{{ $mutabaah->tanggal }}">
                                                            </div>

                                                            <div class="col-md-6 mt-3">
                                                                <div class="mb-3">
                                                                    <h5 class="mb-3">
                                                                        Sholat Berjamaah</h5>
                                                                    <div class="col-md-6 col-12">

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="shubuh"
                                                                                id="flexCheckDefault"
                                                                                {{ $mutabaah->shubuh ? 'checked' : '' }}>
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault">
                                                                                Shubuh
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="dzuhur"
                                                                                id="flexCheckDefault2"
                                                                                {{ $mutabaah->dzuhur ? 'checked' : '' }}>
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault2">
                                                                                Dzuhur
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ashar"
                                                                                {{ $mutabaah->ashar ? 'checked' : '' }}
                                                                                id="flexCheckDefault3">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault3">
                                                                                Ashar
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="maghrib"
                                                                                {{ $mutabaah->maghrib ? 'checked' : '' }}
                                                                                id="flexCheckDefault4">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault4">
                                                                                Maghrib
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="isya"
                                                                                id="flexCheckDefault5"
                                                                                {{ $mutabaah->isya ? 'checked' : '' }}>
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
                                                                            <label for="tilawah">Tilawah</label>
                                                                            <input type="text" class="form-control"
                                                                                name="tilawah" id="tilawah"
                                                                                value="{{ $mutabaah->tilawah }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="alMulk"
                                                                                {{ $mutabaah->al_mulk ? 'checked' : '' }}
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
                                                                                {{ $mutabaah->solawat ? 'checked' : '' }}
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
                                                                                {{ $mutabaah->al_kahfi ? 'checked' : '' }}
                                                                                id="alkahfi">
                                                                            <label for="alkahfi" class="px-2">Al -
                                                                                Kahfi(Jum'at)</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="tahajud"
                                                                                {{ $mutabaah->tahajud ? 'checked' : '' }}
                                                                                id="tahajud">
                                                                            <label for="tahajud"
                                                                                class="px-2">Tahajud</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="dhuha"
                                                                                {{ $mutabaah->dhuha ? 'checked' : '' }}
                                                                                id="dhuha">
                                                                            <label for="dhuha"
                                                                                class="px-2">Dhuha</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rs"
                                                                                {{ $mutabaah->rs ? 'checked' : '' }}
                                                                                id="rs">
                                                                            <label for="rs"
                                                                                class="px-2">R.S</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rd"
                                                                                {{ $mutabaah->rd ? 'checked' : '' }}
                                                                                id="rd">
                                                                            <label for="rd"
                                                                                class="px-2">R.D</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rm"
                                                                                {{ $mutabaah->rm ? 'checked' : '' }}
                                                                                id="rm">
                                                                            <label for="rm"
                                                                                class="px-2">R.M</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ri"
                                                                                {{ $mutabaah->ri ? 'checked' : '' }}
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
                                                                            {{ $mutabaah->dzikir_pagi ? 'checked' : '' }}
                                                                            id="pagi">
                                                                        <label for="pagi"
                                                                            class="px-2">Pagi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="petang"
                                                                            {{ $mutabaah->dzikir_petang ? 'checked' : '' }}
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
                                                                            {{ $mutabaah->sahur_senin ? 'checked' : '' }}
                                                                            id="senin">
                                                                        <label for="senin"
                                                                            class="px-2">Senin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="kamis"
                                                                            {{ $mutabaah->sahur_kamis ? 'checked' : '' }}
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
                                                                            {{ $mutabaah->workout_situp ? 'checked' : '' }}
                                                                            id="sitUp">
                                                                        <label for="sitUp" class="px-2">Sit Up
                                                                            100</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="pushUp"
                                                                            {{ $mutabaah->workout_pushup ? 'checked' : '' }}
                                                                            id="pushUp">
                                                                        <label for="pushUp" class="px-2">Push Up
                                                                            100</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="run"
                                                                            {{ $mutabaah->workout_run ? 'checked' : '' }}
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
                                                                <input name="reading_book" id="reading_book"
                                                                    type="text"
                                                                    value="{{ $mutabaah->reading_book }}"
                                                                    class="form-control flatpickr-no-config">
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        {{ $mutabaah->tiga_s ? 'checked' : '' }}
                                                                        name="3s" id="3s">
                                                                    <label for="3s" class="px-2">3S</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        {{ $mutabaah->mendoakan_orangtua ? 'checked' : '' }}
                                                                        name="mendoakanOrangTua"
                                                                        id="mendoakanOrangTua">
                                                                    <label for="mendoakanOrangTua"
                                                                        class="px-2">Mendoakan Orang Tua</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        {{ $mutabaah->bersyukur ? 'checked' : '' }}
                                                                        name="bersyukur" id="bersyukur">
                                                                    <label for="bersyukur" class="px-2">Bersyukur
                                                                        Kepada Allah</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        {{ $mutabaah->mendoakan_oranglain ? 'checked' : '' }}
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
