<!DOCTYPE html>
<html lang="en">

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
        @include('include.sidebar')
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">
                <div class="page-heading">
                    <h3>Edit Data Prestasi Santri</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('updateprestasi', $edit['id']) }}">
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
                                                                    <select name="santri_id" id="santri_id" class="choices form-select form-control">
                                                                        @foreach ($querysantri as $item)
                                                                            <option value="{{ $item->id }}" {{ $item->id == $edit->santri_id ? 'selected' : '' }}>{{ $item->nama_santri }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <label for="kategori_prestasi">Kategori Prestasi</label>
                                                                <select class="choices form-select" name="kategori_prestasi" id="kategori_prestasi">
                                                                    <option value="Akademik" {{ $edit->kategori_prestasi == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                                                    <option value="Olahraga" {{ $edit->kategori_prestasi == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                                                    <option value="Seni dan Budaya" {{ $edit->kategori_prestasi == 'Seni dan Budaya' ? 'selected' : '' }}>Seni dan Budaya</option>
                                                                    <option value="Kebersihan" {{ $edit->kategori_prestasi == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                                                                    <option value="Public Speaking" {{ $edit->kategori_prestasi == 'Public Speaking' ? 'selected' : '' }}>Public Speaking</option>
                                                                    <option value="Ekstrakurikuler" {{ $edit->kategori_prestasi == 'Ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="nama_prestasi">Nama Prestasi</label>
                                                                    <input type="text" id="nama_prestasi" class="form-control" placeholder="Nama Prestasi" name="nama_prestasi" value="{{ $edit->nama_prestasi }}">
                                                                    @error('nama_prestasi')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="keterangan_prestasi">Keterangan Prestasi</label>
                                                                    <input type="text" id="keterangan_prestasi" class="form-control" placeholder="Keterangan Prestasi" name="keterangan_prestasi" value="{{ $edit->keterangan_prestasi }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <label for="tglprestasi">Tanggal</label>
                                                                <input name="tglprestasi" id="tglprestasi" type="date" class="form-control flatpickr-no-config" placeholder="Select date.." value="{{ $edit->tglprestasi }}">
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                                                <a href="{{ route('prestasi') }}" type="reset" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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
