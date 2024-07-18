<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Dashboard</title>




    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
</head>

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
                <div class="d-flex justify-content-between">
                    <div class="page-heading">
                        <h3>Tambah Data Mutabaah {{ Auth::user()->name }}</h3>
                    </div>
                    <div class="">
                        <a href="{{ route('mutabaah') }}" type="reset"
                            class="btn btn-secondary me-1 mb-1">Kembali</a>
                    </div>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">

                            <form method="post" action="{{ route('storeMutabaah') }}" enctype="multipart/form-data">
                                @csrf
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="santri_id">Nama Santri</label>
                                                                    <input disabled name="name" type="text"
                                                                        id="" value="{{ Auth::user()->name }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <label for="basicInput">Tanggal</label>
                                                                <input name="tanggal" id="tanggal"
                                                                    type="date"
                                                                    class="form-control flatpickr-no-config"
                                                                    placeholder="Select date..">
                                                            </div>

                                                            <div class="col-md-6 mt-3">
                                                                <div class="mb-3">
                                                                    <h5 class="mb-3">
                                                                        Sholat Berjamaah</h5>
                                                                    <div class="col-md-6 col-12">

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="shubuh"
                                                                                id="flexCheckDefault">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault">
                                                                                Shubuh
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="dzuhur"
                                                                                id="flexCheckDefault2">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault2">
                                                                                Dzuhur
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ashar"
                                                                                id="flexCheckDefault3">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault3">
                                                                                Ashar
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="maghrib"
                                                                                id="flexCheckDefault4">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault4">
                                                                                Maghrib
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-md-12 col-12 mb-2">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="isya"
                                                                                id="flexCheckDefault5">
                                                                            <label class="form-check-label px-2"
                                                                                for="flexCheckDefault5">
                                                                                Isya
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12 mt-3">
                                                                <div class="col-md-12">
                                                                    <h5>Sunnah</h5>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label
                                                                                for="first-name-column">Tilawah</label>
                                                                            <input type="text" class="form-control"
                                                                                name="tilawah" id="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="alMulk"
                                                                                id="alMulk">
                                                                            <label for="alMulk" class="px-2">Al -
                                                                                Mulk
                                                                                Sebelum Tidur</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="solawat"
                                                                                id="solawat">
                                                                            <label for="solawat"
                                                                                class="px-2">Membaca
                                                                                Sholawat</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="alkahfi"
                                                                                id="alkahfi">
                                                                            <label for="alkahfi" class="px-2">Al -
                                                                                Kahfi(Jum'at)</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="tahajud"
                                                                                id="tahajud">
                                                                            <label for="tahajud"
                                                                                class="px-2">Tahajud</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="dhuha"
                                                                                id="dhuha">
                                                                            <label for="dhuha"
                                                                                class="px-2">Dhuha</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rs"
                                                                                id="rs">
                                                                            <label for="rs"
                                                                                class="px-2">R.S</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rd"
                                                                                id="rd">
                                                                            <label for="rd"
                                                                                class="px-2">R.D</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="rm"
                                                                                id="rm">
                                                                            <label for="rm"
                                                                                class="px-2">R.M</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ri"
                                                                                id="ri">
                                                                            <label for="ri"
                                                                                class="px-2">R.I</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="col-md-12">
                                                                    <h5>Dzikir</h5>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="pagi"
                                                                            id="pagi">
                                                                        <label for="pagi"
                                                                            class="px-2">Pagi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="petang"
                                                                            id="petang">
                                                                        <label for="petang"
                                                                            class="px-2">Petang</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="col-md-12">
                                                                    <h5>Sahur & Shaum</h5>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="senin"
                                                                            id="senin">
                                                                        <label for="senin"
                                                                            class="px-2">Senin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="kamis"
                                                                            id="kamis">
                                                                        <label for="kamis"
                                                                            class="px-2">Kamis</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <div class="col-md-12">
                                                                    <h5>Work Out</h5>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="sitUp"
                                                                            id="sitUp">
                                                                        <label for="sitUp" class="px-2">Sit Up
                                                                            100</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="pushUp"
                                                                            id="pushUp">
                                                                        <label for="pushUp" class="px-2">Push Up
                                                                            100</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="run"
                                                                            id="run">
                                                                        <label for="run"
                                                                            class="px-2">Run</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <h5>Muamalah & Ihsan</h5>
                                                            </div>
                                                            <div class="col-md-6 col-12 mb-3">
                                                                <label for="basicInput">Reading Book</label>
                                                                <input name="reading" id="reading" type="text"
                                                                    class="form-control flatpickr-no-config">
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="3s" id="3s">
                                                                    <label for="3s" class="px-2">3S</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="mendoakanOrangTua"
                                                                        id="mendoakanOrangTua">
                                                                    <label for="mendoakanOrangTua"
                                                                        class="px-2">Mendoakan Orang Tua</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="bersyukur" id="bersyukur">
                                                                    <label for="bersyukur" class="px-2">Bersyukur
                                                                        Kepada Allah</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="mendoakanOrangLain"
                                                                        id="mendoakanOrangLain">
                                                                    <label for="mendoakanOrangLain"
                                                                        class="px-2">Mendoakan Orang Lain</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1">Submit</button>
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
