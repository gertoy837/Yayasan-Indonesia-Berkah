@include('include.bagianatas')
   
<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href=" {{ route('santri') }}">IB Data</a>
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
                        <a href="{{ route('santridashboard') }}" class='sidebar-link '>
                            <i class="bi bi-grid-fill"></i>
                            <p class="dika ml-4">Dashboard</p>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('santri') }}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <p class="dika ml-4">Data Santri</p>
                        </a>
                    </li>
                
                    <li class="sidebar-item ">
                        <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                            <i class="bi bi-exclamation-triangle"></i>
                            <p class="dika ml-4">Pelanggaran</p>
                        </a>
                    </li>
        
                    <li class="sidebar-item active">
                        <a href="{{ route('prestasi') }}" class='sidebar-link'>
                            <i class="bi bi-trophy"></i>
                            <p class="dika ml-4">Prestasi</p>
                        </a>
                    </li>
        
                    <li class="sidebar-item ">
                        <a href="{{ route('mutabaah') }}" class='sidebar-link'>
                            <i class="bi bi-calendar"></i>
                            <p class="dika ml-4">Mutabaah Santri</p>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('nilai') }}" class='sidebar-link'>
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
                                  

        @include('include.modal')

         

                    <div class="table-card prestasi-card-container">
                        <div class=" text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0">Prestasi Santri</h3>
                                <center>
                                        


                                </center>
                                <a class="btn btn-md btn-primary " style="margin-bottom:20px" href="{{route('tambahprestasi')}}"><i class="fas fa-plus-circle"></i> Add New Data</a>  
                            </div>
                        </div>
                            <div class="card-body py-4 px-4">
                                <table class="table text-start align-right table-bordered table-hover mb-0 "
                                        <thead>
                                            <tr class="text-white">
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Santri</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Prestasi</th>
                                                <th scope="col">Kategori Prestasi</th>
                                                <th scope="col">Keterangan Prestasi</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php
                                                $no = 1;
                                            ?>  
                                            @foreach ($query as $item)
                                            <tr id="prestasi-list">
                                                <td>{{$no}}</td>
                                                <td>{{$item->santri->nama_santri}}</td>
                                                <td>{{$item->tglprestasi}}</td>
                                                <td>{{$item->nama_prestasi}}</td>
                                                <td>{{$item->kategori_prestasi}}</td>
                                                <td>{{$item->keterangan_prestasi}}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning rounded-pill m-2" href="{{route('editprestasi',$item->id)}}"><i class="fa fa-solid fa-pen"></i></a>
                                                    <a class="btn btn-light rounded-pill m-2" href="{{route('hapusprestasi',$item->id)}}" onclick="return confirm('Mau Dihapus?!')"><i class="fa fa-solid fa-trash"></i></a>
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
        </div>
    </div>
  
    @include('include.bagianbawah')

{{-- Search --}}
</body>

</html>