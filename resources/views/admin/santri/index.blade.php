@extends('../../include/adminsidebar')
@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.adminheader')
            @section('sidebar-menu')
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item">
                        <a href="{{ route('admindashboard') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a href="{{ route('adminsantri') }}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Data Santri</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('adminpelanggaran') }}" class='sidebar-link'>
                            <i class="bi bi-exclamation-triangle"></i>
                            <span>Pelanggaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('adminprestasi') }}" class='sidebar-link'>
                            <i class="bi bi-trophy"></i>
                            <span>Prestasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
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

            <div id="main-content">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif

                <!-- ThemeModal -->
                @include('include.thememodal')

                <div id="clients" class="the-clients">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p id="result-count" class="dika mt-3"></p>
                                </div>
                                <div class="naccs">
                                    <div class="grid">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-12 align-self-center santri-card-container">
                                                <div class="menu" id="santri-list">
                                                    @foreach ($users as $item)
                                                        <div class="first-thumb active table-card mb-3">
                                                            <div class="thumb">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <p class="teks1 rating">4.8</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-4 col-md-4 col-sm-6 d-none d-sm-block">
                                                                        <p class="teks1 mt-2">
                                                                            {{ $item->santri->angkatan_santri ?? 'Tidak Ada Data' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                                        <h4>{{ $item->nama_lengkap }}</h4>
                                                                        <p class="teks1 date">
                                                                            {{ $item->santri->tgllahir_santri ?? 'Tidak Ada Data' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="d-flex justify-content-center mt-4">
                                                    {{ $users->links() }}
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-12">
                                                <ul class="nacc">
                                                    @foreach ($users as $item)
                                                        <li class="{{ $loop->first ? 'active' : '' }}">
                                                            <div>
                                                                <div class="thumb">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="client-content">
                                                                                <img src="{{ asset('templatemo/assets/images/quote.png') }}"
                                                                                    alt="">
                                                                                <p class="dika">“Lorem ipsum dolor sit
                                                                                    amet, consectetur adpiscing elit,
                                                                                    sed do eismod tempor idunte ut
                                                                                    labore et dolore magna aliqua darwin
                                                                                    kengan lorem ipsum dolor sit amet,
                                                                                    consectetur picing elit massive big
                                                                                    blasta.”</p>
                                                                            </div>
                                                                            <div
                                                                                class="d-flex down-content justify-content-between">
                                                                                @if ($item->photo_santri)
                                                                                    <img src="{{ asset('storage/images/' . $item->photo_santri) }}"
                                                                                        alt="Foto Santri"
                                                                                        class="img-fluid">
                                                                                @else
                                                                                    @if ($item->jk_santri == 'Ikhwan')
                                                                                        <img src="{{ asset('storage/avatars/default_ikhwan.jpg') }}"
                                                                                            alt="Avatar Muslim (Ikhwan)"
                                                                                            class="img-fluid">
                                                                                    @else
                                                                                        <img src="{{ asset('storage/avatars/default_akhwat.jpg') }}"
                                                                                            alt="Avatar Muslimah (Akhwat)"
                                                                                            class="img-fluid">
                                                                                    @endif
                                                                                @endif
                                                                                <div
                                                                                    class="col-lg-6 col-md-6 col-sm-6 col-12 mt-4 ml-4">
                                                                                    <h4 class="dika">
                                                                                        {{ $item->nama_lengkap }}
                                                                                    </h4>
                                                                                    <p class="dika">
                                                                                        {{ $item->santri->angkatan_santri }}
                                                                                    </p>
                                                                                    <a class="btn btn-warning bg-warning mt-1"
                                                                                        href="{{ route('admineditsantri', $item->santri->id) }}">Edit</a>
                                                                                    <a class="btn btn-primary bg-primary mt-1"
                                                                                        href="{{ route('admindetailsantri', $item->santri->id) }}">Detail</a>
                                                                                    <a class="btn btn-danger bg-danger mt-1"
                                                                                        href="{{ route('adminhapussantri', $item->santri->id) }}"
                                                                                        onclick="return confirm('Mau Dihapus?!')"><i
                                                                                            class="fa fa-solid fa-trash"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Include Bagian Bawah --}}
        @include('include.bagianbawah')
    </div>
</body>
