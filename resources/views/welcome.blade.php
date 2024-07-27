
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>IB DATA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('templatemo') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('templatemo') }}/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{ asset('templatemo') }}/assets/css/animated.css">
    <link rel="stylesheet" href="{{ asset('templatemo') }}/assets/css/owl.css">

  </head>

<body>

 

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="{{ asset('templatemo') }}/assets/images/logoIB.png" style="width:  35%; height: 35%;" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              {{-- <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
              <li class="scroll-to-section"><a href="#newsletter">Newsletter</a></li> --}}
              <li><div class="gradient-button">
                @guest
                <!-- Menampilkan jika pengguna belum login -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authModal">
                    Login / Register
                </button>
            @else
                @php
                    // Mendapatkan peran pengguna yang sedang login
                    $role = Auth::user()->role;
                @endphp
            
                @if ($role === 'admin')
                    <a href="{{ url('/admindashboard') }}" class="btn btn-primary">
                        Dashboard Admin
                    </a>
                @elseif ($role === 'santri')
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        Dashboard Santri
                    </a>
                @elseif ($role === 'donatur')
                    <a href="{{ url('/donaturdashboard') }}" class="btn btn-primary">
                        Dashboard Donatur
                    </a>
                @else
                    <!-- Jika peran tidak dikenal, arahkan ke dashboard umum atau berikan pesan -->
                    <a href="{{ url('/') }}" class="btn btn-primary">
                        Dashboard
                    </a>
                @endif
            @endguest
                </div>
              </li>
            </ul>        
            <a class='menu-trigger'>
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
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginForm" type="button" role="tab" aria-controls="loginForm" aria-selected="true">Log in</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerForm" type="button" role="tab" aria-controls="registerForm" aria-selected="false">Register</button>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content mt-4" id="authTabContent">
                    <!-- Login Form Tab -->
                    <div class="tab-pane fade show active" id="loginForm" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="login" class="form-label">Username atau Email</label>
                                <input type="text" name="login" class="form-control" id="login" placeholder="Username atau Email" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded-pill">Log in</button>
                        </form>
                    </div>
                    <!-- Register Form Tab -->
                    <div class="tab-pane fade" id="registerForm" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                              <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" required>
                          </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded-pill">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Scripts -->
  <script src="{{ asset('templatemo') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('templatemo') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/owl-carousel.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/animation.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/imagesloaded.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/popup.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

  <!-- ***** Header Area Start ***** -->
  
  <!-- ***** Header Area End ***** -->
 




<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginForm" type="button" role="tab" aria-controls="loginForm" aria-selected="true">Log in</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerForm" type="button" role="tab" aria-controls="registerForm" aria-selected="false">Register</button>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content mt-4" id="authTabContent">
                    <!-- Login Form Tab -->
                    <div class="tab-pane fade show active" id="loginForm" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded-pill">Log in</button>
                        </form>
                    </div>
                    <!-- Register Form Tab -->
                    <div class="tab-pane fade" id="registerForm" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select" required>
                                    <option value="santri">Santri</option>
                                    <option value="admin">Admin</option>
                                    <option value="donatur">Donatur</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded-pill">Sign Up</button>
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
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12" style="color: #fff">
                    <h2>IB Data Santri</h2>
                    <p style="color: #fff">IB Data Santri adalah platform untuk mengakses dan mengelola informasi penting mengenai santri.
                       Web ini mencakup profil santri, prestasi santri, jadwal kegiatan, absensi santri, dan informasi lainnya yang diperlukan untuk memantau dan mendukung perkembangan pendidikan santri</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('templatemo') }}/assets/images/slider-dec.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Developer <em>IB Data</em> Team</h4>
            <img src="{{ asset('templatemo') }}/assets/images/heading-line-dec.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
            <div class="service-item second-service">
              <div class=""></div>
              <h4>R.R Nayla Nadya Wibowo</h4>
              <p></p>
              <div class="text-button">
                <a href="https://www.instagram.com/n4ylnw">Here <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        <div class="col-lg-2">
          <div class="service-item second-service">
            <div class=""></div>
            <h4>Ana Rahma Niraswati</h4>
            <p></p>
            <div class="text-button">
              <a href="https://www.instagram.com/rahmawatiniras49/">Here <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="service-item third-service">
            <div class=""></div>
            <h4>Mahardika Mahmud Suhari</h4>
            <p></p>
            <div class="text-button">
              <a href="https://www.instagram.com/mahardikamahmud.s">Here <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="service-item fourth-service">
            <div class=""></div>
            <h4>Yuanita Selenia</h4>
            <p></p>
            <div class="text-button">
              <a href="https://www.instagram.com/slnzx_nn/">Here <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
            <div class="service-item fourth-service">
              <div class=""></div>
              <h4>Nurul Aniq Khoirunnisa</h4>
              <p></p>
              <div class="text-button">
                <a href="https://www.instagram.com/nurulaniq_/">Here <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>


  <!-- Scripts -->
  <script src="{{ asset('templatemo') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('templatemo') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/owl-carousel.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/animation.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/imagesloaded.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/popup.js"></script>
  <script src="{{ asset('templatemo') }}/assets/js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




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
