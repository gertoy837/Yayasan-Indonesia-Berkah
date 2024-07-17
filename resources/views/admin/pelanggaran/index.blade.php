@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href=" {{ route('adminsantri') }}">IB Data</a>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <h4 class="sidebar-title">Menu</h4>
                        <li class="sidebar-item ">
                        <a href="{{ route('admindashboard') }}" class='sidebar-link '>
                            <i class="bi bi-grid-fill"></i>
                            <p class="dika ml-4">Dashboard</p>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('adminsantri') }}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <p class="dika ml-4">Data Santri</p>
                        </a>
                    </li>
                
                    <li class="sidebar-item active">
                        <a href="{{ route('adminpelanggaran') }}" class='sidebar-link'>
                            <i class="bi bi-exclamation-triangle"></i>
                            <p class="dika ml-4">Pelanggaran</p>
                        </a>
                    </li>
        
                    <li class="sidebar-item ">
                        <a href="{{ route('adminprestasi') }}" class='sidebar-link'>
                            <i class="bi bi-trophy"></i>
                            <p class="dika ml-4">Prestasi</p>
                        </a>
                    </li>
        
                    <li class="sidebar-item ">
                        <a href="{{ route('adminmutabaah') }}" class='sidebar-link'>
                            <i class="bi bi-calendar"></i>
                            <p class="dika ml-4">Mutabaah Santri</p>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('adminnilai') }}" class='sidebar-link'>
                            <i class="bi bi-paper fill"></i>
                            <p class="dika ml-4">Nilai Santri</p>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">     
                
                
        {{-- MODAL TAMBAH SANTRI --}}
                      <div class="modal fade text-left modal-borderless" id="tambahsantri" tabindex="-1"
                      role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Masukkan Data Santri</h5>
                                  <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                      aria-label="Close">
                                      <i data-feather="x"></i>
                                  </button>
                              </div>
                              <form method="post" action="{{ route('adminstoretambah') }}" enctype="multipart/form-data">

                                  @csrf                                              <div class="card">
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
                                                                                  <input type="text" id="domisili_santri" class="form-control" placeholder="Domisili"
                                                                                      name="domisili_santri">
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
                                                                          <input name="tgllahir_santri" id="tgllahir_santri" type="date" class="form-control flatpickr-no-config" placeholder="Select date..">                                                                
                                                                          
                                                                      </div>
                                                                      <div class="col-md-4">
                                                                          <label for="photo_santri">Photo Santri</label>
                                                                      </div>
                                                                      <div class="col-md-8 form-group">
                                                                              <input class="form-control" name="photo_santri" type="file" id="formFile">
                                                                      </div>
                                                                      <div class="col-md-4">
                                                                          <label for=" jk_santri">Jenis Kelamin</label>
                                                                      </div>
                                                                      <div class="col-md-8 form-group">
                                                                          <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="jk_santri" id="flexRadioDefault1" value="Ikhwan">
                                                                              <label class="form-check-label" for="flexRadioDefault1">
                                                                                  Ikhwan
                                                                              </label>
                                                                          </div>
                                                                          <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="jk_santri" id="flexRadioDefault1" value="Akhwat">
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
                                                          <button type="button" class="btn btn-light-secondary"
                                                              data-bs-dismiss="modal">
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




                  {{-- MODAL PRESTASI --}}
                  <div class="modal fade text-left modal-borderless" id="tambahpelanggaran" tabindex="-1"
                      role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Masukkan Data Pelanggaran</h5>
                                  <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                      aria-label="Close">
                                      <i data-feather="x"></i>
                                  </button>
                              </div>
                              <form method="post" action="{{ route('adminstorepelanggaran') }}" enctype="multipart/form-data">

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
                                                                          <select class="form-select" id="inputGroupSelect01" name="kategori_pelanggaran">
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
                                                                      
                                                                      <textarea class="form-control" id="deskripsi_pelanggaran" class="form-control"
                                                                      placeholder="Deskripsi Pelanggaran" name="deskripsi_pelanggaran" rows="3"></textarea>
                                                                  </div>
                                                                  
                                                                  
                                                                  <br>
                                                                  
                                                              </div>
                                                          </div>
                                                      </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-light-secondary"
                                                          data-bs-dismiss="modal">
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

                  <div class="modal fade text-left modal-borderless" id="tambahprestasi" tabindex="-1"
                      role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Masukkan Data Prestasi</h5>
                                  <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                      aria-label="Close">
                                      <i data-feather="x"></i>
                                  </button>
                              </div>
                              <form method="post" action="{{ route('adminstoreprestasi') }}" enctype="multipart/form-data">

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
                                                                      
                                                                      <textarea class="form-control" id="keterangan_prestasi" class="form-control"
                                                                      placeholder="Deskripsi Prestasi" name="keterangan_prestasi" rows="3"></textarea>
                                                                  </div>
                                                                   
                                                                  
                                                                  <br>
                                                                  
                                                              </div>
                                                          </div>
                                                      </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-light-secondary"
                                                          data-bs-dismiss="modal">
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
       <div class="table-card prestasi-card-container">
        <div class=" text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-0">Pelanggaran Santri</h3>
                <center>
                        


                </center>
                <a class="btn btn-md btn-primary " style="margin-bottom:20px" href="{{route('admintambahpelanggaran')}}"><i class="fas fa-plus-circle"></i> Add New Data</a>  
            </div>
        </div>
            <div class="card-body py-4 px-4">
                <table class="table text-start align-right table-bordered table-hover mb-0 "
                        <thead>
                            <tr class="text-white">
                                <th scope="col">No</th>
                                <th scope="col">Nama Santri</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pelanggaran</th>
                                <th scope="col">Kategori pelanggaran</th>
                                <th scope="col">Keterangan pelanggaran</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                                $no = 1;
                            ?>  
                            @foreach ($query as $item)
                            <tr id="pelanggaran-list">
                                <td>{{$no}}</td>
                                <td>{{$item->santri->nama_santri}}</td>
                                <td>{{$item->tglpelanggaran}}</td>
                                <td>{{$item->nama_pelanggaran}}</td>
                                <td>{{$item->kategori_pelanggaran}}</td>
                                <td>{{$item->deskripsi_pelanggaran}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning rounded-pill m-2" href="{{route('admineditpelanggaran',$item->id)}}"><i class="fa fa-solid fa-pen"></i></a>
                                    <a class="btn btn-light rounded-pill m-2" href="{{route('adminhapuspelanggaran',$item->id)}}" onclick="return confirm('Mau Dihapus?!')"><i class="fa fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                $no++;
                                ?>
                            @endforeach
                        </tbody>
                </table>
            </div>
    </div>
        </div>
    </div>
    @include('include.bagianbawah')
    
    
</body>

</html>