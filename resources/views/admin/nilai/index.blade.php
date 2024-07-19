@extends('template.adminNilai')
@section('adminNilai')
    <div class="table-card prestasi-card-container">
        <div class="text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h3 class="mb-0">Nilai Santri</h3>
                <a class="btn btn-md btn-primary" style="margin-bottom:20px" href="{{ route('admintambahnilai') }}">
                    <i class="fas fa-plus-circle"></i> Add New Data
                </a>
            </div>
            <div class="d-flex justify-content-start gap-2">
                <div class="form-group">
                    <select class="form-select" id="genderSelect">
                        <option hidden>Gender</option>
                        <option value="Ikhwan">Ikhwan</option>
                        <option value="Akhwat">Akhwat</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-select" id="classSelect">
                        <option hidden>Kelas</option>
                        <option value="Mustawa 1">Mustawa 1</option>
                        <option value="Mustawa 2">Mustawa 2</option>
                        <option value="Mustawa 3">Mustawa 3</option>
                    </select>
                </div>
                <div class="py-2">
                    <a class="btn-sm btn-success p-2"  href="{{ route('adminnilai') }}">
                        <i class="fas fa-filter"></i> All
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body py-4 px-4">
                <table class="table number align-right table-bordered table-hover mb-0">
                    <h5 class="card-title">Table Data Nilai Santri</h5><br>
                    <thead>
                        <tr class="text-white">
                            <th scope="col">No</th>
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
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($query as $item)
                        @php
                        $santri = $santris->where('nama_santri', $item->namasantri)->first();
                        @endphp
                        @if ($santri)
                        <tr data-gender="{{ $santri->jk_santri }}" data-class="{{ $santri->angkatan_santri }}">
                            <td>{{ $no }}</td>
                            <td>{{ $item->namasantri }}</td>
                            <td>{{ $item->Fiqih }}</td>
                            <td>{{ $item->IT }}</td>
                            <td>{{ $item->Hadis }}</td>
                            <td>{{ $item->Quran }}</td>
                            <td>{{ $item->BahasaArab }}</td>
                            <td>{{ $item->BahasaInggris }}</td>
                            <td>{{ $item->Polygon }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning rounded-pill m-2" href="{{ route('admineditnilai', $item->id) }}">
                                    <i class="fa fa-solid fa-pen"></i>
                                </a>
                                <a class="btn btn-light rounded-pill m-2" href="{{ route('adminhapusnilai', $item->id) }}"
                                    onclick="return confirm('Mau Dihapus!?')">
                                    <i class="fa fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        ?>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const genderSelect = document.getElementById('genderSelect');
            const classSelect = document.getElementById('classSelect');
            const tableBody = document.getElementById('santriTableBody');
            const rows = tableBody.getElementsByTagName('tr');

            function filterTable() {
                const selectedGender = genderSelect.value;
                const selectedClass = classSelect.value;

                for (let row of rows) {
                    const rowGender = row.getAttribute('data-gender');
                    const rowClass = row.getAttribute('data-class');

                    const genderMatch = !selectedGender || selectedGender === rowGender;
                    const classMatch = !selectedClass || selectedClass === rowClass;

                    if (genderMatch && classMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }

            genderSelect.addEventListener('change', filterTable);
            classSelect.addEventListener('change', filterTable);
        });
    </script>

@endsection
