@extends('template.adminNilai')
@section('adminNilai')
    <div class="table-card prestasi-card-container">
        <div class="text-center rounded">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h3 class="mb-0">Nilai Santri</h3>
                <a class="btn btn-md btn-primary" style="margin-bottom:20px" href="{{ route('admintambahnilai') }}">
                    <i class="fas fa-plus-circle"></i> Add New Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <form id="filterForm" action="{{ route('adminnilai') }}" method="GET" class="mb-3">
                <div class="d-flex justify-content-end gap-2">
                    <div class="">
                        <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
                    </div>
                    <div class="">
                        <select name="gender" id="genderSelect" class="form-select pe-5">
                            <option value="">Semua gender</option>
                            <option value="Ikhwan" {{ request('gender') == 'Ikhwan' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Akhwat" {{ request('gender') == 'Akhwat' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="">
                        <select name="angkatan" id="angkatanSelect" class="form-select pe-5">
                            <option value="">Semua Angkatan</option>
                            @foreach ($angkatanList as $angkatan)
                                <option value="{{ $angkatan }}"
                                    {{ request('angkatan') == $angkatan ? 'selected' : '' }}>
                                    {{ $angkatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <table class="table number align-right table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Nama Santri</th>
                        <th scope="col">Fiqih</th>
                        <th scope="col">IT</th>
                        <th scope="col">Hadis</th>
                        <th scope="col">Quran</th>
                        <th scope="col">Bahasa Arab</th>
                        <th scope="col">Bahasa Inggris</th>
                        <th scope="col">Polygon</th>
                        <th style="center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="santriTableBody">
                    @foreach ($query as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->Fiqih }}</td>
                            <td>{{ $item->IT }}</td>
                            <td>{{ $item->Hadis }}</td>
                            <td>{{ $item->Quran }}</td>
                            <td>{{ $item->BahasaArab }}</td>
                            <td>{{ $item->BahasaInggris }}</td>
                            <td>{{ $item->Polygon }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning rounded-pill m-2"
                                    href="{{ route('admineditnilai', $item->nilai_id) }}">
                                    <i class="fa fa-solid fa-pen"></i>
                                </a>
                                <a class="btn btn-light rounded-pill m-2"
                                    href="{{ route('adminhapusnilai', $item->nilai_id) }}"
                                    onclick="return confirm('Mau Dihapus!?')">
                                    <i class="fa fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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