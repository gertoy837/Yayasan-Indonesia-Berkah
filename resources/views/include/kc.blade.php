<!-- Pelanggaran Import Modal -->
<div class="modal fade" id="pelanggaranImportModal" tabindex="-1" aria-labelledby="pelanggaranImportModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('importpelanggaran') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="pelanggaranImportModalLabel">Import Data Pelanggaran</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Choose File</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Prestasi Import Modal -->
<div class="modal fade" id="prestasiImportModal" tabindex="-1" aria-labelledby="prestasiImportModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('importprestasi') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="prestasiImportModalLabel">Import Data Prestasi</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Choose File</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Santri Modal -->
<div class="modal fade" id="addSantriModal" tabindex="-1" aria-labelledby="addSantriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('storeSantri') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addSantriModalLabel">Add Santri</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                                    <select class="form-select" id="inputGroupSelect01"
                                                        name="angkatan_santri">
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
                                                        class="form-control flatpickr-no-config"
                                                        placeholder="Select date..">

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
                                                        <input class="form-check-input" type="radio"
                                                            name="jk_santri" id="flexRadioDefault1" value="Ikhwan">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Ikhwan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="jk_santri" id="flexRadioDefault1" value="Akhwat">
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
            </form>
        </div>
    </div>
</div>

<!-- Santri Import Modal -->
<div class="modal fade" id="santriImportModal" tabindex="-1" aria-labelledby="santriImportModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('importsantri') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="santriImportModalLabel">Import Data Santri</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Choose File</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
