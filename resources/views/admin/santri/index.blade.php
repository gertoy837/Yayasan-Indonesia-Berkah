@extends('../../include/adminsidebar')

<head>
    @include('include.bagianatas')
    <script>
        function autoSubmit() {
            document.getElementById('filter-form').submit();
        }

        function clearSearch() {
            document.getElementById('search_name').value = '';
            document.getElementById('filter_gender').value = '';
            document.getElementById('filter_angkatan').value = '';
            document.getElementById('filter_tahun_angkatan').value = '';
            autoSubmit();
        }

        // Add this new function for debounce
        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        // Add event listener for name search input
        document.addEventListener('DOMContentLoaded', function() {
            const searchNameInput = document.getElementById('search_name');
            searchNameInput.addEventListener('input', debounce(function() {
                autoSubmit();
            }, 300)); // 300ms delay
        });

        document.addEventListener('DOMContentLoaded', function() {
            $('#inlineForm').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var userId = button.data('userid');
                var modal = $(this);
                modal.find('#user_id').val(userId);

                var userName = '';
                @foreach ($users as $item)
                    if ({{ $item->id }} == userId) {
                        userName = '{{ $item->nama_lengkap }}';
                    }
                @endforeach
                modal.find('#nama_lengkap').val(userName);
            });
        });
    </script>
</head>

<body>
    <script src="{{ asset('template/dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @section('sidebar-menu')
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ route('admindashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('adminakun') }}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Data Akun</span>
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

        {{-- Modal Creata Santri With Account --}}
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Create Data</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ route('adminStoreById') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="user_id" name="user_id">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nama_lengkap">Nama Lengkap: </label>
                                    <div class="form-group">
                                        <input id="nama_lengkap" name="nama_lengkap" type="text"
                                            placeholder="Nama Lengkap" class="form-control">
                                    </div>
                                    <label for="jk_santri">Jenis Kelamin: </label>
                                    <div class="form-group">
                                        <select id="jk_santri" name="jk_santri" class="form-select">
                                            <option hidden>Gender</option>
                                            <option value="Ikhwan">Ikhwan</option>
                                            <option value="Akhwat">Akhwat</option>
                                        </select>
                                    </div>
                                    <label for="angkatan_santri">Angkatan: </label>
                                    <div class="form-group">
                                        <select class="form-select" id="Kelas" name="angkatan_santri">
                                            <option hidden>Pilih Kelas...</option>
                                            <option value="Mustawa 1">Mustawa 1</option>
                                            <option value="Mustawa 2">Mustawa 2</option>
                                            <option value="Mustawa 3">Mustawa 3</option>
                                            <option value="Khidmat">Khidmat</option>
                                        </select>
                                    </div>
                                    <label for="tahun_angkatan_santri">Tahun Angkatan: </label>
                                    <div class="form-group">
                                        <input id="tahun_angkatan_santri" name="tahun_angkatan_santri" type="text"
                                            placeholder="Tahun Angkatan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tgllahir_santri">Tanggal Lahir: </label>
                                    <div class="form-group">
                                        <input id="tgllahir_santri" name="tgllahir_santri" type="date"
                                            class="form-control">
                                    </div>
                                    <label for="alamat_santri">Alamat: </label>
                                    <div class="form-group">
                                        <textarea id="alamat_santri" rows="4" name="alamat_santri" class="form-control" placeholder="Alamat"></textarea>
                                    </div>
                                    <label for="photo_santri">Foto: </label>
                                    <div class="form-group">
                                        <input id="photo_santri" name="photo_santri" type="file"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ms-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Import --}}
    <div class="form-group">
        <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Import Data Santri </h4>
                        <a href="{{ asset('template-import/template_data_santri.xlsx') }}"
                            class="btn btn-outline-info">
                            <i class="fa fa-download"></i> Download Template Excel
                        </a>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.import.santri') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <input type="file" name="file" class="basic-filepond">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Kirim</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="main" class='layout-navbar navbar-fixed'>
        @include('include.header')
        <div id="main-content">
            <div class="table-card prestasi-card-container">
                <div class="text-center rounded">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0">Data Santri</h3>
                        <div class="">
                            {{-- <button type="button" class="btn btn-success me-1" data-bs-toggle="modal"
                                data-bs-target="#inlineForm1">
                                Import Data
                            </button> --}}
                            <a class="btn btn-md btn-primary" href="{{ route('admintambahsantri') }}">
                                <i class="fas fa-plus-circle"></i> Add New Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <form id="filter-form" action="{{ route('adminsantri') }}" method="GET" class="mb-3">
                            <div class="d-flex justify-content-end gap-2">
                                <div class="">
                                    <input type="text" name="search_name" id="search_name" class="form-control"
                                        placeholder="Search by name" value="{{ request('search_name') }}">
                                </div>
                                <div class="">
                                    <select name="filter_gender" id="filter_gender" class="form-control"
                                        onchange="autoSubmit()">
                                        <option value="">All Genders</option>
                                        <option value="Ikhwan"
                                            {{ request('filter_gender') == 'Ikhwan' ? 'selected' : '' }}>Ikhwan
                                        </option>
                                        <option value="Akhwat"
                                            {{ request('filter_gender') == 'Akhwat' ? 'selected' : '' }}>Akhwat
                                        </option>
                                    </select>
                                </div>
                                <div class="">
                                    <select name="filter_angkatan" id="filter_angkatan" class="form-control"
                                        onchange="autoSubmit()">
                                        <option value="">All Angkatan</option>
                                        @foreach ($angkatans as $angkatan)
                                            <option value="{{ $angkatan }}"
                                                {{ request('filter_angkatan') == $angkatan ? 'selected' : '' }}>
                                                {{ $angkatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <select name="filter_tahun_angkatan" id="filter_tahun_angkatan"
                                        class="form-control" onchange="autoSubmit()">
                                        <option value="">All Tahun Angkatan</option>
                                        @foreach ($tahun_angkatans as $tahun)
                                            <option value="{{ $tahun }}"
                                                {{ request('filter_tahun_angkatan') == $tahun ? 'selected' : '' }}>
                                                {{ $tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="clearSearch()">Clear</button>
                                </div>
                            </div>
                        </form>
                        <table class="table text-start align-right table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col" class="text-center" width="5%">No</th>
                                    <th scope="col" class="text-center">Nama Santri</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Angkatan</th>
                                    <th scope="col" class="text-center">Tahun</th>
                                    <th scope="col" class="text-center">Tanggal Lahir</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">Foto</th>
                                    <th scope="col" class="text-center" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="pelanggaran-list">
                                @php
                                    $start = ($users->currentPage() - 1) * $users->perPage() + 1;
                                @endphp
                                @foreach ($users as $item)
                                    <tr>
                                        <td class="text-center">{{ $start + $loop->index }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ !empty($item->santri->jk_santri) ? $item->santri->jk_santri : '' }}</td>
                                        <td>{{ !empty($item->santri->angkatan_santri) ? $item->santri->angkatan_santri : '' }}
                                        </td>
                                        <td>{{ !empty($item->santri->tahun_angkatan_santri) ? $item->santri->tahun_angkatan_santri : '' }}
                                        </td>
                                        <td>{{ !empty($item->santri->tgllahir_santri) ? $item->santri->tgllahir_santri : '' }}
                                        </td>
                                        <td>{{ !empty($item->santri->alamat_santri) ? $item->santri->alamat_santri : '' }}
                                        </td>
                                        @if (!empty($item->santri->photo_santri) ? $item->santri->photo_santri : '')
                                            <td class="avatar avatar-xl p-0 my-2 ml-3 me-1">
                                                <img
                                                    src="{{ asset('storage') }}/images/{{ $item->santri->photo_santri }}">
                                            </td>
                                        @else
                                            <td class="avatar avatar-xl p-0 my-2 ml-3 me-1">
                                                @if (!empty($item->santri->jk_santri) ? $item->santri->jk_santri == 'Ikhwan' : '')
                                                    <img src="{{ asset('storage') }}/avatars/default_ikhwan.jpg">
                                                @else
                                                    <img src="{{ asset('storage') }}/avatars/default_akhwat.jpg">
                                                @endif
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            @if (empty($item->santri))
                                                {{-- <a class="btn btn-success rounded-3 p-2 me-1"
                                                    href="{{ route('admintambahsantri') }}">
                                                    <i class="fa fa-solid fa-plus"></i>
                                                </a> --}}
                                                <button type="button"
                                                    class="btn btn-outline-success rounded-3 p-2 me-1"
                                                    data-bs-toggle="modal" data-bs-target="#inlineForm"
                                                    data-userid="{{ $item->id }}">
                                                    <i class="fa fa-solid fa-plus"></i>
                                                </button>
                                            @else
                                                <a class="btn btn-warning rounded-3 p-2 me-1"
                                                    href="{{ route('admineditsantri', $item->santri->id) }}">
                                                    <i class="fa fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('adminhapussantri', $item->santri->user_id) }}"
                                                    method="POST" style="display: inline;"
                                                    onsubmit="return confirm('Mau Dihapus?!')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-3 p-2 me-1">
                                                        <i class="fa fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.bagianbawah')
    </div>
</body>

</html>
