<header>
    <nav class="navbar navbar-expand navbar-light navbar-top align-items-right">
        <div class="container-fluid justity-content-beetwen">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3 text-white"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->nama_lengkap }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->role }}</p>
                            </div>
                            @if (Auth::user()->santri == null)
                                <div class="ms-3 avatar avatar-xl">
                                    <img src="{{ asset('template/dist') }}/assets/compiled/jpg/1.jpg" alt="Face 1">
                                </div>
                            @else
                                @if (Auth::user()->role == 'santri')
                                    @if (Auth::user()->santri->photo_santri)
                                        <div class="ms-3 avatar avatar-xl">
                                            <img alt="Foto Santri"
                                                src="{{ asset('storage') }}/images/{{ Auth::user()->santri->photo_santri }}">
                                        </div>
                                    @else
                                        <div class="ms-3 avatar avatar-xl">
                                            @if (Auth::user()->santri->jk_santri == 'Ikhwan')
                                                <img alt="Foto Ikhwan"
                                                    src="{{ asset('storage') }}/avatars/default_ikhwan.jpg">
                                            @else
                                                <img alt="Foto Akhwat"
                                                    src="{{ asset('storage') }}/avatars/default_akhwat.jpg">
                                            @endif
                                        </div>
                                    @endif
                                @else
                                    <div class="ms-3 avatar avatar-xl">
                                        <img src="{{ asset('template/dist') }}/assets/compiled/jpg/1.jpg"
                                            alt="Face 1">
                                    </div>
                                @endif
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end x-slot" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ Auth::user()->nama_lengkap }}</h6>
                        </li>
                        @if (Auth::user()->role == 'santri')
                            <li><x-dropdown-link :href="route('detailsantri', Auth()->id())" class="dropdown-item">
                                    <i class="icon-mid bi bi-person me-2"></i>
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            </li>
                        @endif
                        <li>
                            <hr>
                            <center>
                                <div type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#themeModal">
                                    Pilih Tema
                                </div>
                            </center>
                        </li>
                        <li>
                            <hr>
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
