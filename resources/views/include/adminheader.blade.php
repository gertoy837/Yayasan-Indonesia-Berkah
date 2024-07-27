<header>
    <nav class="navbar navbar-expand navbar-light navbar-top align-items-right">
        <div class="container-fluid justity-content-beetwen">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3" style="color: white; margin-top: 4px;"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container mt-3">
                <div class="col-lg-8 ">
                    <div class="input-group mb-2" style="">
                        <input type="text" id="search" class="form-control" name="keyword"
                            placeholder="Telusuri Data Santri"
                            style="background-color: rgba(243, 243, 243, 0.341); border-radius:20px; color: white;">
                    </div>
                </div>
            </div>
            <span class="btn" id="delete-all"><i class="fas fa-trash-alt"></i></span>

            <div class="collapse navbar-collapse" style="margin-left: 60px;" id="navbarSupportedContent">

                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('template/dist') }}/assets/compiled/jpg/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h6 class="font-bold mt-2">Admin, {{ Auth::user()->nama_lengkap }}</h6>
                                <label class="text-muted mb-0">Log <code>Out? </code></label>
                            </div>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end x-slot" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ Auth::user()->nama_lengkap }}</h6>
                        </li>
                        <li><x-dropdown-link :href="route('profile.edit')" class="dropdown-item"><i
                                    class="icon-mid bi bi-person me-2"></i>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <center>
                                <div type="button" class="btn" data-toggle="modal" data-target="#themeModal">
                                    Pilih Tema
                                </div>
                            </center>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="#" :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Include Bootstrap JS and Popper.js -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        </div>
    </nav>
</header>
