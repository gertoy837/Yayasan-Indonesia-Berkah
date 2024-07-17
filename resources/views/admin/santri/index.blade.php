
@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">

        <!--SideBar Include -->
        @include('include.adminsidebar')


        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.adminheader')
     
            <div id="main-content"> 
                @if ($message = Session::get('success'))
                     <p>{{ $message }}</p>
                 @endif
                
                 <!-- ThemeModal -->
                 @include('include.thememodal')

                <div id="clients" class="the-clients">
                    <div class="col-lg-12">
                        <div class="d-flex col-lg-8 ">
                        
                        {{-- <div class="col-lg-6 mb-1 mt-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary sort-button" data-sort-by="nama_santri" data-sort-order="asc">
                                        <i class="fas fa-sort-alpha-down"></i> Nama
                                    </button>
                                    <button class="btn btn-outline-secondary sort-button" data-sort-by="tgllahir_santri" data-sort-order="asc">
                                        <i class="fas fa-sort-numeric-down"></i> Tanggal Lahir
                                    </button>
                                    <button class="btn btn-outline-secondary sort-button" data-sort-by="angkatan_santri" data-sort-order="asc">
                                        <i class="fas fa-sort-amount-down"></i> Angkatan
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                        <p id="result-count" class="dika mt-3"></p>
                        </div>
                        <div class="naccs">
                            <div class="grid">
                                <div class="row">
                                    <div class="row">
                                     
                                    <div class="col-lg-7 align-self-center santri-card-container">
                                        <div class="menu" id="santri-list">
                                            @foreach ($santris as $item)
                                                <div class="first-thumb active table-card">
                                                    <div class="thumb">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-4 col-12">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <p class="teks1 rating">4.8</p>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                                                                <p class="teks1 mt-2">{{$item->angkatan_santri}}</p>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-4 col-12">
                                                                <h4>{{$item->nama_santri}}</h4>
                                                                <p class="teks1 date">{{$item->tgllahir_santri}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <ul class="nacc">
                                            @foreach ($santris as $item)
                                                <li class="{{ $loop->first ? 'active' : '' }}">
                                                    <div>
                                                        <div class="thumb">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="client-content mt-2">
                                                                        <img src="{{ asset('templatemo/assets/images/quote.png') }}" alt="">
                                                                        <p class="dika">“Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                                                                    </div>
                                                                    <div class="d-flex down-content justify-items-between">
                                                                            @if($item->photo_santri)
                                                                            <img src="{{ asset('storage/images/' . $item->photo_santri) }}" alt="Foto Santri" class="img-fluid">
                                                                            @else
                                                                            @if($item->jk_santri == 'Ikhwan')
                                                                                <img src="{{ asset('storage/avatars/default_ikhwan.jpg') }}" alt="Avatar Muslim (Ikhwan)" class="img-fluid">
                                                                            @else
                                                                                <img src="{{ asset('storage/avatars/default_akhwat.jpg') }}" alt="Avatar Muslimah (Akhwat)" class="img-fluid">
                                                                            @endif
                                                                            @endif

                                                                        <div class="col-lg-6 mt-4 ml-4">
                                                                            <br>
                                                                            <h4 class="dika">{{$item->nama_santri}}</h4>
                                                                            <p class="dika">{{$item->angkatan_santri}}</p>
                                                                            <a class="btn btn-warning bg-warning mt-1"  href="{{route('admineditsantri',$item->id)}}">Edit</a>
                                                                            <a class="btn btn-primary bg-primary mt-1"  href="{{route('admindetailsantri',$item->id)}}">Detail</a>
                                                                            <a class="btn btn-danger bg-danger mt-1" href="{{route('adminhapussantri',$item->id)}}" onclick="return confirm('Mau Dihapus?!')"><i class="fa fa-solid fa-trash"></i></a>
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
    </div>
  
    {{-- Include Bagian Bawah --}}
    @include('include.bagianbawah')