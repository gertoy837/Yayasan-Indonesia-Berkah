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
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route('adminsantri') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route('adminsantri') }}">
                <img src="{{ asset('template/dist') }}/assets/compiled/svg/logo.svg">
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div id="main-content">
                    <div class="page-content">
                        <section class="section">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Data Santri</h3>
                                    <a href="{{ route('adminsantri') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form">
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="first-name-column">Nama
                                                                            Lengkap</label>
                                                                        <input type="text" id="first-name-column"
                                                                            class="form-control"
                                                                            placeholder="Nama Lengkap"
                                                                            name="nama_santri"
                                                                            value="{{ $santri->user->nama_lengkap }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label>Tingkatan/Kelas</label>
                                                                    <div class="form-group">
                                                                        <input type="text" id="company-column"
                                                                            class="form-control" name="angkatan_santri"
                                                                            placeholder="angkatan Lengkap"
                                                                            value="{{ $santri->angkatan_santri }}"
                                                                            readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="city-column">Domisili</label>
                                                                        <input type="text" id="domisili_santri"
                                                                            class="form-control" placeholder="Domisili"
                                                                            name="domisili_santri"
                                                                            value="{{ $santri->domisili_santri }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label for="basicInput">Tanggal Lahir</label>
                                                                    <input name="tgllahir_santri" id="tgllahir_santri"
                                                                        type="date"
                                                                        class="form-control flatpickr-no-config"
                                                                        value="{{ $santri->tgllahir_santri }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="company-column">ALamat
                                                                            Lengkap</label>
                                                                        <input type="text" id="company-column"
                                                                            class="form-control" name="alamat_santri"
                                                                            placeholder="Alamat Lengkap"
                                                                            value="{{ $santri->alamat_santri }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="company-column">Jenis Kelamin
                                                                            Santri</label>
                                                                        <input type="text" id="company-column"
                                                                            class="form-control" name="jk_santri"
                                                                            placeholder="Jenis Kelamin Santri"
                                                                            value="{{ $santri->jk_santri }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>

</body>

</html>
