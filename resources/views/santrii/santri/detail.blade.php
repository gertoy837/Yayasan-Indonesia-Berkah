<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IB - Dashboard</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div id="main-content">
                    <div class="page-content">
                        <section class="section">
                            <div class="card">
                                <div class="d-flex px-4 justify-content-between align-items-center">
                                    <h3 class="card-title">Detail Data Santri</h3>
                                    <a class="btn btn-primary" href="{{ route('santridashboard') }}">
                                        <i class="bi bi-chevron-left"></i> Kembali
                                    </a>
                                </div>
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="card">
                                                                @if ($user->santri->photo_santri)
                                                                    <div>
                                                                        <img class="img-fluid rounded-3" alt="Foto Santri"
                                                                            src="{{ asset('storage') }}/images/{{ $user->santri->photo_santri }}">
                                                                    </div>
                                                                @else
                                                                    <div>
                                                                        @if ($user->santri->jk_santri == 'Ikhwan')
                                                                            <img class="img-fluid rounded-3" alt="Foto Ikhwan"
                                                                                src="{{ asset('storage') }}/avatars/default_ikhwan.jpg">
                                                                        @else
                                                                            <img class="img-fluid rounded-3"
                                                                                alt="Foto Akhwat"
                                                                                src="{{ asset('storage') }}/avatars/default_akhwat.jpg">
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Nama Lengkap</td>
                                                                        <td>: {{ $user->nama_lengkap }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td>: {{ $user->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jenis Kelamin</td>
                                                                        <td>: {{ $user->santri->jk_santri }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Lahir</td>
                                                                        <td>: {{ $user->santri->tgllahir_santri }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Angkatan</td>
                                                                        <td>: {{ $user->santri->angkatan_santri }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tahun Angkatan</td>
                                                                        <td>:
                                                                            {{ $user->santri->tahun_angkatan_santri }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alamat</td>
                                                                        <td>: {{ $user->santri->alamat_santri }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Prestasi</td>
                                                                        <td>: {{ $totalprestasi }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Pelanggaran</td>
                                                                        <td>: {{ $totalpelanggaran }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
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
