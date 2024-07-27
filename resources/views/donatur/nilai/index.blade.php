@extends('template.donaturNilai')
@section('donaturNilai')
    <div class="table-card prestasi-card-container">
        <div class="text-center rounded">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h3 class="mb-0">Nilai Santri</h3>
            </div>
        </div>
        <div class="card-body">
            <form id="filterForm" action="{{ route('donatur.nilai') }}" method="GET" class="mb-3">
                <div class="d-flex justify-content-end gap-2">
                    <div class="">
                        <input type="text" name="search" id="searchInput" class="form-control"
                            placeholder="Search by name" value="{{ request('search') }}">
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
            <div class="overflow-y-hidden">
                <table class="table number align-right table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col" class="text-center" width="2%">No</th>
                            <th scope="col" class="text-center px-3" style="white-space: nowrap" width="10%">Nama Santri
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
                        </tr>
                    </thead>
                    <tbody id="santriTableBody">
                        @foreach ($query as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
