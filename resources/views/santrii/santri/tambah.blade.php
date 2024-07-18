<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    
    
    
    
    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">

      {{-- Photo Uploader --}}
      <link rel="stylesheet" href="{{ asset('template/dist/assets') }}/extensions/filepond/filepond.css">
      <link rel="stylesheet" href="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css">
</head>

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js "></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href=" {{ route('santri') }}">IB Data</a>
                    </div>
                    <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                            role="img" class="iconify iconify--system-uicons" width="20" height="20"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                            role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item ">
                        <a href="{{ route('santridashboard') }}" class='sidebar-link '>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a href="{{ route('santri') }}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Data Santri</span>
                        </a>
                    </li>
                
                    <li class="sidebar-item ">
                        <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                            <i class="bi bi-exclamation-triangle"></i>
                            <span>Pelanggaran</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="{{ route('prestasi') }}" class='sidebar-link'>
                            <i class="bi bi-trophy"></i>
                            <span>Prestasi</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="{{ route('mutabaah') }}" class='sidebar-link'>
                            <i class="bi bi-calendar"></i>
                            <span>Mutabaah Santri</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{ route('nilai') }}" class='sidebar-link'>
                            <i class="bi bi-paper fill"></i>
                            <span>Nilai Santri</span>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')

            <div id="main-content">                
                <div class="page-heading">
                    <h3 >Tambah Data Santri</h3>
                </div> 
                <div class="page-content"> 
                    <section class="section">
                        <div class="card">
                            <form method="post" action="{{ route('storetambah') }}" enctype="multipart/form-data">
                                @csrf
                                        <section id="multiple-column-form">
                                            <div class="row match-height">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <form class="form">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-column">Nama Lengkap</label>
                                                                                <input type="text" id="first-name-column" class="form-control"
                                                                                    placeholder="Nama Lengkap" name="nama_santri">
                                                                                    @error('nama_santri')
                                                                                    <small class="text-danger">{{$message}}</small>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <label>Tingkatan/Kelas</label>
                                                                                <div class="input-group mb-3">
                                                                                <select class="form-select" id="inputGroupSelect01" name="angkatan_santri">
                                                                                    <option selected>Pilih...</option>
                                                                                    <option>Mustawa 1</option>
                                                                                    <option>Mustawa 2</option>
                                                                                    <option>Mustawa 3</option>
                                                                                </select>
                                                                                <label class="input-group-text" for="inputGroupSelect01">Tingkatan</label>
                                                                                @error('angkatan_santri')
                                                                                <small class="text-danger">{{$message}}</small>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="city-column">Domisili</label>
                                                                                <input type="text" id="domisili_santri" class="form-control" placeholder="Domisili"
                                                                                name="domisili_santri">
                                                                                @error('domisili_santri')
                                                                                <small class="text-danger">{{$message}}</small>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <label for="basicInput">Tanggal Lahir</label>
                                                                            <input name="tgllahir_santri" id="tgllahir_santri" type="date" class="form-control flatpickr-no-config" placeholder="Select date..">
                                                                            @error('tgllahir_santri')
                                                                            <small class="text-danger">{{$message}}</small>
                                                                            @enderror                                                             
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="company-column">ALamat Lengkap</label>
                                                                                <input type="text" id="company-column" class="form-control"
                                                                                name="alamat_santri" placeholder="Alamat Lengkap">
                                                                                @error('alamat_santri')
                                                                                <small class="text-danger">{{$message}}</small>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <label for="basicInput">Jenis Kelamin Santri</label>                                                                
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="jk_santri" id="flexRadioDefault1" value="Ikhwan">
                                                                                @error('jk_santri')
                                                                                <small class="text-danger">{{$message}}</small>
                                                                                @enderror
                                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                                    Ikhwan
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="jk_santri" id="flexRadioDefault1" value="Akhwat">
                                                                                @error('jk_santri')
                                                                                <small class="text-danger">{{$message}}</small>
                                                                                @enderror
                                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                                    Akhwat
                                                                                </label>
                                                                            </div>    
                                                                        </div>

                                                                        <div class="col-md-6 col-12">
                                                                            <div class="mb-3">
                                                                                <input type="file" id="formFile" name="photo_santri" class="image-crop-filepond" image-crop-aspect-ratio="1:1">
                                                                                <small class="text-muted">Pilih file JPG, JPEG, PNG, atau GIF. Maksimum 2MB.</small>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="col-md-6 col-12">
                                                                            <label for="avatar-choice" class="form-label">Pilih Avatar</label>
                                                                            <select class="form-select" id="avatar-choice" name="avatar_choice">
                                                                                <option value="storage/avatars/default_ikhwan.jpg">Avatar Muslim (Ikhwan)</option>
                                                                                <option value="storage/avatars/default_akhwat.jpg">Avatar Muslimah (Akhwat)</option>
                                                                            </select>
                                                                        </div> --}}
                                                                        
                                                                        <div class="col-12 d-flex justify-content-end">
                                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                                            <a href="{{ route('santri') }}" type="reset" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                                        </div>
                                                                    </div>
                                                                </form>
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


    <script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/filepond/filepond.js"></script>
<script src="{{ asset('template/dist/assets') }}/extensions/toastify-js/src/toastify.js"></script>
<script src="{{ asset('template/dist/assets') }}/static/js/pages/filepond.js"></script>
        
      

<script>
    @if(session('status'))
        Toastify({
            text: "{{ session('status') }}",
            duration: 3000, // 3 seconds
            gravity: "bottom", // 'top' or 'bottom'
            position: "right", // 'left', 'center' or 'right'
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    @endif
</script>
    
</body>
</html>