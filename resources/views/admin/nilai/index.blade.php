@extends('template.adminNilai')
@section('adminNilai')
    {{-- Modal Import --}}
    <div class="form-group">
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Import Data Nilai</h4>
                        <a href="{{ asset('template-import/template_data_nilai.xlsx') }}" class="btn btn-outline-info">
                            <i class="fa fa-download"></i> Download Template Excel
                        </a>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.import.nilai') }}" enctype="multipart/form-data">
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

    <div class="table-card prestasi-card-container">
        <div class="text-center rounded">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h3 class="mb-0">Nilai Santri</h3>
                <div class="">
                    <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#inlineForm">
                        Import Data
                    </button>
                    <a class="btn btn-md btn-primary" href="{{ route('admintambahnilai') }}">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="filter-form" action="{{ route('adminprestasi') }}" class="d-flex justify-content-end gap-2"
                    method="GET">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="search_name" id="search_name" class="form-control"
                                    value="{{ request('search_name') }}" placeholder="Masukkan nama santri..."
                                    oninput="autoSubmit();">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="clearSearch();">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="gender" id="filter_gender" class="form-control" onchange="autoSubmit();">
                            <option value="" hidden>Pilih gender</option>
                            <option value="">Semua</option>
                            <option value="ikhwan" {{ request('gender') == 'ikhwan' ? 'selected' : '' }}>
                                Ikhwan</option>
                            <option value="akhwat" {{ request('gender') == 'akhwat' ? 'selected' : '' }}>
                                Akhwat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="angkatan" id="filter_angkatan" class="form-control" onchange="autoSubmit();">
                            <option value="" hidden>Pilih angkatan</option>
                            <option value="">Semua</option>
                            @foreach ($angkatanList as $angkatan)
                                <option value="{{ $angkatan }}"
                                    {{ request('angkatan') == $angkatan ? 'selected' : '' }}>
                                    {{ $angkatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="overflow-y-hidden">
                    <table class="table number align-right table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col" class="text-center" width="2%">No</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap" width="10%">Nama
                                    Santri
                                </th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Adab</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Aqidah</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Akhlak</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Fiqih</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">IT</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Hadis</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Quran</th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Bahasa Arab
                                </th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Bahasa Inggris
                                </th>
                                <th scope="col" class="text-center px-3" style="white-space: nowrap">Public
                                    Speaking</th>
                                <th scope="col" class="text-center px-5">Action</th>
                            </tr>
                        </thead>
                        <tbody id="santriTableBody">
                            @php
                                $start = ($query->currentPage() - 1) * $query->perPage() + 1;
                            @endphp
                            @foreach ($query as $item)
                                <tr>
                                    <td class="text-center">{{ $start + $loop->index }}</td>
                                    <td>{{ $item->user->nama_lengkap }}</td>
                                    <td>{{ $item->Adab }}</td>
                                    <td>{{ $item->Aqidah }}</td>
                                    <td>{{ $item->Akhlak }}</td>
                                    <td>{{ $item->Fiqih }}</td>
                                    <td>{{ $item->IT }}</td>
                                    <td>{{ $item->Hadis }}</td>
                                    <td>{{ $item->Quran }}</td>
                                    <td>{{ $item->BahasaArab }}</td>
                                    <td>{{ $item->BahasaInggris }}</td>
                                    <td>{{ $item->Public_Speaking }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning rounded-pill m-2"
                                            href="{{ route('admineditnilai', $item->id) }}">
                                            <i class="fa fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('adminhapusnilai', $item->id) }}" method="POST"
                                            style="display: inline;" onsubmit="return confirm('Mau Dihapus?!')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light rounded-pill m-2">
                                                <i class="fa fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {!! $query->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const genderSelect = document.getElementById('genderSelect');
            const angkatanSelect = document.getElementById('angkatanSelect');
            const filterForm = document.getElementById('filterForm');

            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            function submitForm() {
                filterForm.submit();
            }

            const debouncedSubmit = debounce(submitForm, 300);

            searchInput.addEventListener('input', debouncedSubmit);
            genderSelect.addEventListener('change', submitForm);
            angkatanSelect.addEventListener('change', submitForm);
        });
    </script>
@endsection
