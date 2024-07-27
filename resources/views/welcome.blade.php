<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <title>IB Data</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('templati') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('templati') }}/assets/css/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('templati') }}/assets/css/templatemo-space-dynamic.css" />
    <link rel="stylesheet" href="{{ asset('templati') }}/assets/css/animated.css" />
    <link rel="stylesheet" href="{{ asset('templati') }}/assets/css/owl.css" />
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('templati') }}/assets/images/logo_ib.png" alt="IB Logo"
                                style="width: 5%" class="mb-lg-3 mb-md-1 mb-sm-3 mb-3" />
                            <!-- <h4>IB<span>Data</span></h4> -->
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section">
                                <a href="#top" class="active">Home</a>
                            </li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>
                            <li class="scroll-to-section">
                                <div class="main-red-button">
                                    <button data-bs-toggle="modal" data-bs-target="#authModal">
                                        Login
                                    </button>
                                    <!-- <a href="#contact">Login</a> -->
                                </div>
                            </li>
                            <li class="scroll-to-section d-none">
                                <a href="#about">About Us</a>
                            </li>
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Modal -->
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow-lg">
                <!-- Modal Header -->
                <div class="modal-header text-white custom-color-red-original">
                    <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="authTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                                data-bs-target="#loginForm" type="button" role="tab" aria-controls="loginForm"
                                aria-selected="true">Log in</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab"
                                data-bs-target="#registerForm" type="button" role="tab"
                                aria-controls="registerForm" aria-selected="false">Register</button>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-4" id="authTabContent">
                        <!-- Login Form Tab -->
                        <div class="tab-pane fade show active" id="loginForm" role="tabpanel"
                            aria-labelledby="login-tab">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="login" class="form-label">Username atau Email</label>
                                    <input type="text" name="login" class="form-control" id="login"
                                        placeholder="Username atau Email" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn custom-color-red btn-block rounded-pill">Log in</button>
                            </form>
                        </div>
                        <!-- Register Form Tab -->
                        <div class="tab-pane fade" id="registerForm" role="tabpanel" aria-labelledby="register-tab">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                        placeholder="Nama Lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="Konfirmasi Password" required>
                                </div>
                                <button type="submit" class="btn custom-color-red btn-block rounded-pill">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <h6>Selamat Datang di IB Data Santri</h6>
                                <h2>
                                    <em>Informasi Digital</em> &
                                    <span>Perkembangan</span> Santri
                                </h2>
                                <p>
                                    IB Data Santri adalah platform untuk memantau dan mengelola
                                    data santri. Web ini mencakup profil santri, prestasi
                                    santri, jadwal kegiatan, absensi santri, dan informasi
                                    lainnya yang diperlukan untuk memantau dan mendukung
                                    perkembangan pendidikan santri. Website ini dibuat dan
                                    dikembangkan oleh para Santri
                                    <a rel="nofollow" href="https://ib-school.id/" target="_parent">Pesantren
                                        Indonesia Berkah</a>.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('templati') }}/assets/images/profile.png" alt="team meeting"
                                    style="transform: scaleX(-1)" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="our-services section" style="margin-top: 0 !important">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image" style="display: flex; justify-content: center">
                        <img src="{{ asset('templati') }}/assets/images/logo_ib.png" alt=""
                            class="w-75" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>Pesantren Indonesia Berkah</h2>
                        <p>
                            Pesantren Indonesia Berkah Boarding School, didirikan pada Juli
                            2020 oleh Bapak Romzi Rio Wibawa, Bapak Willy Alive, dan Bapak
                            Andi Zulfikar, anggota Keluarga Mahasiswa Islam (GAMAIS) ITB,
                            didirikan untuk menjawab persoalan dalam pendidikan konvensional
                            di Indonesia. Pesantren ini menggabungkan ilmu keagamaan (ulum
                            asy-Syar’i) dengan ilmu modern (IT dan Entrepreneur), bertujuan
                            menghasilkan Da’i mandiri dan profesional yang terampil dalam
                            ilmu Islam dan modern. Fokus pendidikan adalah pada tahfidz,
                            skill bisnis, dan IT, dengan pendekatan pendidikan holistik yang
                            mengembangkan 6 dimensi kehidupan: Holistik, Spiritual,
                            Emosional, Intelektual, Fisikal, Sosial, dan Finansial.
                            Pendekatan ini sejalan dengan karakter holistik Al-Qur'an dan
                            ajaran Islam (QS. 16:89 & QS. 2:208). Dengan 4 Pilar
                            Pembelajaran...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ps-0">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="{{ asset('templati') }}/assets/images/Pillars1.png" alt="person graphic"
                            style="width: 120%" />
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="services">
                        <div class="row align-self-center gap-md-2 gap-xl-0 pt-xl-5 pt-md-0">
                            <div class="col-lg-6 mb-xl-5 mb-md-0">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{ asset('templati') }}/assets/images/quran.png" alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Kapasitas Al-Qur'an & Syari'ah</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-xl-5 mb-md-0">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{ asset('templati') }}/assets/images/language.png"
                                            alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Kapasitas Language & Communication</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-xl-5 mb-md-0">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{ asset('templati') }}/assets/images/leadership.png"
                                            alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Kapasitas Leadership & Productivity</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-xl-5 mb-md-0">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{ asset('templati') }}/assets/images/technology.png"
                                            alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Kapasitas Management & Technology</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>
                            Team <em>IB Data</em>
                            <span>Developer</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row" style="justify-content: center">
                <div class="col-lg-2 col-sm-6">
                    <a href="https://www.instagram.com/n4ylnw">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h5>R.R Nayla Nadya Wibowo</h5>
                            </div>
                            <div class="showed-content">
                                <img src="{{ asset('templati') }}/assets/images/muslimah.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a href="https://www.instagram.com/rahmawatiniras49/">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h5>Ana Rahma Niraswati</h5>
                            </div>
                            <div class="showed-content">
                                <img src="{{ asset('templati') }}/assets/images/muslimah.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <a href="https://www.instagram.com/mahardikamahmud.s">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h5>Mahardika Mahmud Suhari</h5>
                            </div>
                            <div class="showed-content">
                                <img src="{{ asset('templati') }}/assets/images/muslim.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a href="https://www.instagram.com/slnzx_nn/">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h5>Yuanita Selenia</h5>
                            </div>
                            <div class="showed-content">
                                <img src="{{ asset('templati') }}/assets/images/muslimah.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <a href="https://www.instagram.com/nurulaniq_/">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h5>Nurul Aniq Khoirunnisa</h5>
                            </div>
                            <div class="showed-content">
                                <img src="{{ asset('templati') }}/assets/images/muslimah.png" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p class="text-white">
                        © Copyright 2024 Pesantren Indonesia Berkah Co. All Rights
                        Reserved.

                        <br />
                        <a class="text-info" rel="nofollow">Team IB Data Developer</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('templati') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('templati') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templati') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('templati') }}/assets/js/animation.js"></script>
    <script src="{{ asset('templati') }}/assets/js/imagesloaded.js"></script>
    <script src="{{ asset('templati') }}/assets/js/templatemo-custom.js"></script>

    <!-- JavaScript to Handle Modal and Form Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openAuthModalBtn = document.getElementById('openAuthModal');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const showLoginFormBtn = document.getElementById('showLoginForm');
            const showRegisterFormBtn = document.getElementById('showRegisterForm');

            openAuthModalBtn.addEventListener('click', function() {
                // Reset forms and show login form by default
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            });

            showLoginFormBtn.addEventListener('click', function() {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            });

            showRegisterFormBtn.addEventListener('click', function() {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            });
        });
    </script>

</body>

</html>
