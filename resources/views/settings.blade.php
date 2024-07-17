<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Tema - Mazer</title>
    
    <link rel="shortcut icon" href="{{ asset('template/dist/assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/compiled/css/app-dark.css') }}">

    <style>
        .theme-preview {
            width: 100%;
            height: 150px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .theme-option {
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }
        .theme-option.active {
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <script src="{{ asset('template/dist/assets/static/js/initTheme.js') }}"></script>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="index.html"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="{{ asset('template/dist/assets/compiled/svg/logo.svg') }}" alt="Logo">
            </a>
        </div>
    </nav>
        
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pilih Tema</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3 theme-option" data-theme="forest" onclick="selectTheme(this)">
                        <div class="theme-preview" style="background-image: url('{{ asset('template/dist/template/dist/assets/images/forest.jpg') }}');"></div>
                    </div>
                    <div class="col-12 col-md-3 theme-option" data-theme="snow" onclick="selectTheme(this)">
                        <div class="theme-preview" style="background-image: url('{{ asset('template/dist/template/dist/assets/images/snow.jpg') }}');"></div>
                    </div>
                    <div class="col-12 col-md-3 theme-option" data-theme="ricefield" onclick="selectTheme(this)">
                        <div class="theme-preview" style="background-image: url('{{ asset('template/dist/template/dist/assets/images/ricefield.jpg') }}');"></div>
                    </div>
                    <!-- Tambahkan lebih banyak tema di sini sesuai kebutuhan -->
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" onclick="saveTheme()">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="cancel()">Batal</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function selectTheme(element) {
            document.querySelectorAll('.theme-option').forEach(option => {
                option.classList.remove('active');
            });
            element.classList.add('active');
        }
        
        function saveTheme() {
            let selectedTheme = document.querySelector('.theme-option.active').getAttribute('data-theme');
            // Simpan tema terpilih ke server atau local storage
            console.log('Tema terpilih:', selectedTheme);
        }
        
        function cancel() {
            window.history.back();
        }
    </script>
    
    <script src="{{ asset('template/dist/assets/compiled/js/app.js') }}"></script>
</body>

</html>
