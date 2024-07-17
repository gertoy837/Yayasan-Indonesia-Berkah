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
        @include('include.sidebar')
        
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')

            <div id="main-content">                
                <div class="page-heading">
                    <h3>Edit Data Pelanggaran Santri</h3>
                </div> 
                <div class="page-content"> 
                    <section class="section">
                        <div class="card">
                        
                            <form method="post" action="{{ route('updatepelanggaran', $pelanggaran->id) }}" enctype="multipart/form-data">
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
                                                                    <select name="santri_id" id="santri_id" class="choices form-select form-control">
                                                                        @foreach ($querysantri as $item)
                                                                            <option value="{{$item->id}}" {{ $pelanggaran->santri_id == $item->id ? 'selected' : '' }}>{{$item->nama_santri}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-3">
                                                                    <label for="first-name-column">Jenis Pelanggaran</label>
                                                                    <input type="text" id="first-name-column" class="form-control"
                                                                        placeholder="Nama pelanggaran" name="nama_pelanggaran" value="{{ $pelanggaran->nama_pelanggaran }}">
                                                                    @error('nama_pelanggaran')
                                                                        <small class="text-danger">{{$message}}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-3">
                                                                    <label for="first-name-column">Kategori Pelanggaran</label>
                                                                    <select class="form-select" id="inputGroupSelect01" name="kategori_pelanggaran">
                                                                        <option value="" disabled>Pilih...</option>
                                                                        <option value="Ringan" {{ $pelanggaran->kategori_pelanggaran == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                                                                        <option value="Sedang" {{ $pelanggaran->kategori_pelanggaran == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                                        <option value="Berat" {{ $pelanggaran->kategori_pelanggaran == 'Berat' ? 'selected' : '' }}>Berat</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Keterangan Pelanggaran</label>
                                                                    <input type="text" id="first-name-column" class="form-control"
                                                                        placeholder="Keterangan Pelanggaran" name="deskripsi_pelanggaran" value="{{ $pelanggaran->deskripsi_pelanggaran }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <label for="basicInput">Tanggal</label>
                                                                <input name="tglpelanggaran" id="tglpelanggaran" type="date" class="form-control flatpickr-no-config" placeholder="Select date.." value="{{ $pelanggaran->tglpelanggaran }}">
                                                            </div>
                                                            
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                                <a href="{{ route('pelanggaran') }}" type="reset" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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
