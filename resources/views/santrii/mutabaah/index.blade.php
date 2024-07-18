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

                        <li class="sidebar-item">
                            <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                                <i class="bi bi-exclamation-triangle"></i>
                                <p class="dika ml-4">Pelanggaran</p>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('prestasi') }}" class='sidebar-link'>
                                <i class="bi bi-trophy"></i>
                                <p class="dika ml-4">Prestasi</p>
                            </a>
                        </li>

                        <li class="sidebar-item active">
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
                <div class="table-card prestasi-card-container">
                    <div class=" text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0">Pelanggaran Santri</h3>
                            <center>
                            </center>
                            <a class="btn btn-md btn-primary " style="margin-bottom:20px"
                                href="{{ route('tambahMutabaah') }}"><i class="fas fa-plus-circle"></i> Add
                                New Data</a>
                        </div>
                    </div>
                    <div class="card-body py-4 px-4">
                        <table class="table text-start align-right table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white text-center">
                                    <th scope="col" rowspan="2">No</th>
                                    <th scope="col" rowspan="2" style="padding: 2rem">Tanggal</th>
                                    <th scope="col" colspan="5" style="white-space: nowrap; padding: 0 2rem">
                                        Sholat Berjamaah</th>
                                    <th scope="col" colspan="10">Sunnah</th>
                                    <th scope="col" colspan="2">Dzikir</th>
                                    <th scope="col" colspan="2" style="white-space: nowrap; padding: 0 2rem">
                                        Sahur & Shaum</th>
                                    <th scope="col" colspan="3">Work Out</th>
                                    <th scope="col" colspan="5">Muamalah & Ihsan</th>
                                </tr>
                                <tr class="text-white">
                                    <th scope="col" class="text-center" style="white-space: nowrap">S</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">D</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">A</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">M</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">I</th>
                                    <th scope="col" style="white-space: nowrap">Tilawah</th>
                                    <th scope="col" style="white-space: nowrap">Al - Mulk Sebelum Tidur</th>
                                    <th scope="col" style="white-space: nowrap">Membaca Solawat</th>
                                    <th scope="col" style="white-space: nowrap">Al-Kahfi (Jum'at)</th>
                                    <th scope="col" style="white-space: nowrap">Tahajud</th>
                                    <th scope="col" style="white-space: nowrap">Dhuha</th>
                                    <th scope="col" style="white-space: nowrap">R.S</th>
                                    <th scope="col" style="white-space: nowrap">R.D</th>
                                    <th scope="col" style="white-space: nowrap">R.M</th>
                                    <th scope="col" style="white-space: nowrap">R.I</th>
                                    <th scope="col" style="white-space: nowrap">Pagi</th>
                                    <th scope="col" style="white-space: nowrap">Petang</th>
                                    <th scope="col" style="white-space: nowrap">Senin</th>
                                    <th scope="col" style="white-space: nowrap">Selasa</th>
                                    <th scope="col" style="white-space: nowrap">Sit Up 100</th>
                                    <th scope="col" style="white-space: nowrap">Push Up 100</th>
                                    <th scope="col" style="white-space: nowrap">Run</th>
                                    <th scope="col" style="white-space: nowrap">3S</th>
                                    <th scope="col" style="white-space: nowrap">Mendoakan Orang Tua</th>
                                    <th scope="col" style="white-space: nowrap">Bersyukur Kepada Allah</th>
                                    <th scope="col" style="white-space: nowrap">Reading Book</th>
                                    <th scope="col" style="white-space: nowrap">Mendoakan Orang Lain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $date = date('Y-m-d');
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $date }}</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>5 lembar juz 1</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td></td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td></td>
                                    <td></td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td></td>
                                    <td></td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>1 Halaman</td>
                                    <td>√</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('include.bagianbawah')
    </div>
</body>

</html>
