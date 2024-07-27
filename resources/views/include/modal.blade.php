{{-- Modal --}}
{{-- MODAL TAMBAH SANTRI --}}
<div class="modal fade text-left modal-borderless" id="tambahsantri" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukkan Data Santri</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{ route('storetambah') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nama_santri">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_santri" class="form-control"
                                                placeholder="Nama Lengkap" name="nama_santri">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="domisili_santri">Domisili</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="domisili_santri" class="form-control"
                                                placeholder="Domisili" name="domisili_santri">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="alamat_santri">Alamat Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="company-column" class="form-control"
                                                name="alamat_santri" placeholder="Alamat Lengkap">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="angkatan_santri">Angkatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-select" id="inputGroupSelect01" name="angkatan_santri">
                                                <option selected>Pilih...</option>
                                                <option>Mustawa 1</option>
                                                <option>Mustawa 2</option>
                                                <option>Mustawa 3</option>
                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label for=" tgllahir_santri">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input name="tgllahir_santri" id="tgllahir_santri" type="date"
                                                class="form-control flatpickr-no-config" placeholder="Select date..">

                                        </div>
                                        <div class="col-md-4">
                                            <label for="photo_santri">Photo Santri</label>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Photo Santri</label>
                                                <input type="file" id="formFile" name="photo_santri"
                                                    class="image-crop-filepond" image-crop-aspect-ratio="1:1">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for=" jk_santri">Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk_santri"
                                                    id="flexRadioDefault1" value="Ikhwan">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Ikhwan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk_santri"
                                                    id="flexRadioDefault1" value="Akhwat">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Akhwat
                                                </label>
                                            </div>
                                        </div>

                                        <br>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>

{{-- MODAL Pelanggaran --}}
<div class="modal fade text-left modal-borderless" id="tambahpelanggaran" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukkan Data Pelanggaran</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{ route('storepelanggaran') }}" enctype="multipart/form-data">

                @csrf
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nama_santri">Nama Santri</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_santri" class="form-control"
                                                placeholder="Nama Santri" name="nama_santri">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nama_pelanggaran">Pelanggaran</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_pelanggaran" class="form-control"
                                                placeholder="Nama pelanggaran" name="nama_pelanggaran">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kategori_pelanggaran">Jenis</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-select" id="inputGroupSelect01"
                                                name="kategori_pelanggaran">
                                                <option selected>Pilih...</option>
                                                <option>Ringan</option>
                                                <option>Sedang</option>
                                                <option>Berat</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="deskripsi_pelanggaran">Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="deskripsi_pelanggaran" class="form-control" placeholder="Deskripsi Pelanggaran"
                                                name="deskripsi_pelanggaran" rows="3"></textarea>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-borderless" id="tambahprestasi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukkan Data Prestasi</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{ route('storeprestasi') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nama_santri">Nama Santri</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_santri" class="form-control"
                                                placeholder="Nama Santri" name="nama_santri">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nama_santri">Nama Prestasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_prestasi" class="form-control"
                                                placeholder="Nama Prestasi" name="nama_prestasi">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kategori_prestasi">Kategori</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="kategori prestasi" name="kategori_prestasi">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="keterangan_prestasi">Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea class="form-control" id="keterangan_prestasi" class="form-control" placeholder="Deskripsi Prestasi"
                                                name="keterangan_prestasi" rows="3"></textarea>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal End --}}
