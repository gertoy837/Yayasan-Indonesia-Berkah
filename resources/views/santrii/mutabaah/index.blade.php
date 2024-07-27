@extends('../../include/sidebar')
@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        @section('sidebar-menu')
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ route('santridashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item ">
                    <a href="{{ route('santri') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Data Santri</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('prestasi') }}" class='sidebar-link'>
                        <i class="bi bi-trophy"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="sidebar-item active">
                    <a href="{{ route('mutabaah') }}" class='sidebar-link'>
                        <i class="bi bi-calendar"></i>
                        <span>Mutaba'ah Santri</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('nilai') }}" class='sidebar-link'>
                        <i class="bi bi-award"></i>
                        <span>Nilai Santri</span>
                    </a>
                </li>
            </ul>
        @endsection
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">
                <div class="table-card prestasi-card-container">
                    <div class="text-center rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>Data Mutabaah {{ Auth::user()->nama_lengkap }}</h3>
                        </div>
                    </div>
                    <!-- Dropdown for selecting month -->
                    <div class="mb-3">
                        <!-- Form untuk memilih bulan dan tahun -->
                        <form id="filter-form" method="GET" action="{{ route('mutabaah') }}">
                            <div class="d-flex justify-content-lg-end">
                                <div class="form-group">
                                    <select name="bulan" id="bulan" class="form-control">
                                        @foreach ($months as $month)
                                            <option value="{{ $month->month }}"
                                                {{ $month->month == $selectedMonth ? 'selected' : '' }}>
                                                {{ $month->month_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="tahun" id="tahun" class="form-control">
                                        @foreach ($years as $year)
                                            <option value="{{ $year->year }}"
                                                {{ $year->year == $selectedYear ? 'selected' : '' }}>
                                                {{ $year->year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="overflow-y-hidden">
                        <table class="table text-start align-right table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white text-center">
                                    <th scope="col" rowspan="2">No</th>
                                    <th scope="col" rowspan="2" style="padding: 2rem">Tanggal</th>
                                    <th scope="col" colspan="5" style="white-space: nowrap; padding: 0 2rem">
                                        Sholat Berjamaah</th>
                                    <th scope="col" colspan="10">Sunnah</th>
                                    <th scope="col" colspan="2">Dzikir</th>
                                    <th scope="col" colspan="2" style="white-space: nowrap; padding: 0 2rem">Sahur
                                        & Shaum</th>
                                    <th scope="col" colspan="3">Work Out</th>
                                    <th scope="col" colspan="5">Muamalah & Ihsan</th>
                                </tr>
                                <tr class="text-white">
                                    <th scope="col" class="text-center" style="white-space: nowrap">S</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">D</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">A</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">M</th>
                                    <th scope="col" class="text-center" style="white-space: nowrap">I</th>
                                    <th scope="col" style="white-space: nowrap">Tilawah</th>
                                    <th scope="col" style="white-space: nowrap">Al - Mulk Sebelum Tidur</th>
                                    <th scope="col" style="white-space: nowrap">Membaca Solawat</th>
                                    <th scope="col" style="white-space: nowrap">Al-Kahfi (Jum'at)</th>
                                    <th scope="col" style="white-space: nowrap">Tahajud</th>
                                    <th scope="col" style="white-space: nowrap">Dhuha</th>
                                    <th scope="col" style="white-space: nowrap">R.S</th>
                                    <th scope="col" style="white-space: nowrap">R.D</th>
                                    <th scope="col" style="white-space: nowrap">R.M</th>
                                    <th scope="col" style="white-space: nowrap">R.I</th>
                                    <th scope="col" style="white-space: nowrap">Pagi</th>
                                    <th scope="col" style="white-space: nowrap">Petang</th>
                                    <th scope="col" style="white-space: nowrap">Senin</th>
                                    <th scope="col" style="white-space: nowrap">Selasa</th>
                                    <th scope="col" style="white-space: nowrap">Sit Up 100</th>
                                    <th scope="col" style="white-space: nowrap">Push Up 100</th>
                                    <th scope="col" style="white-space: nowrap">Run</th>
                                    <th scope="col" style="white-space: nowrap">3S</th>
                                    <th scope="col" style="white-space: nowrap">Mendoakan Orang Tua</th>
                                    <th scope="col" style="white-space: nowrap">Bersyukur Kepada Allah</th>
                                    <th scope="col" style="white-space: nowrap">Reading Book</th>
                                    <th scope="col" style="white-space: nowrap">Mendoakan Orang Lain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mutabaah as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->shubuh ? '√' : '' }}</td>
                                        <td>{{ $item->dzuhur ? '√' : '' }}</td>
                                        <td>{{ $item->ashar ? '√' : '' }}</td>
                                        <td>{{ $item->maghrib ? '√' : '' }}</td>
                                        <td>{{ $item->isya ? '√' : '' }}</td>
                                        <td style="white-space: nowrap">{{ $item->tilawah }}</td>
                                        <td>{{ $item->al_mulk ? '√' : '' }}</td>
                                        <td>{{ $item->solawat ? '√' : '' }}</td>
                                        <td>{{ $item->al_kahfi ? '√' : '' }}</td>
                                        <td>{{ $item->tahajud ? '√' : '' }}</td>
                                        <td>{{ $item->dhuha ? '√' : '' }}</td>
                                        <td>{{ $item->rs ? '√' : '' }}</td>
                                        <td>{{ $item->rd ? '√' : '' }}</td>
                                        <td>{{ $item->rm ? '√' : '' }}</td>
                                        <td>{{ $item->ri ? '√' : '' }}</td>
                                        <td>{{ $item->dzikir_pagi ? '√' : '' }}</td>
                                        <td>{{ $item->dzikir_petang ? '√' : '' }}</td>
                                        <td>{{ $item->sahur_senin ? '√' : '' }}</td>
                                        <td>{{ $item->sahur_kamis ? '√' : '' }}</td>
                                        <td>{{ $item->workout_situp ? '√' : '' }}</td>
                                        <td>{{ $item->workout_pushup ? '√' : '' }}</td>
                                        <td>{{ $item->workout_run ? '√' : '' }}</td>
                                        <td>{{ $item->tiga_s ? '√' : '' }}</td>
                                        <td>{{ $item->mendoakan_orangtua ? '√' : '' }}</td>
                                        <td>{{ $item->bersyukur ? '√' : '' }}</td>
                                        <td style="white-space: nowrap">{{ $item->reading_book }}</td>
                                        <td>{{ $item->mendoakan_oranglain ? '√' : '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.bagianbawah')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const yearSelect = document.getElementById('tahun');
            const monthSelect = document.getElementById('bulan');
            const filterForm = document.getElementById('filter-form');

            function submitForm() {
                filterForm.submit();
            }

            yearSelect.addEventListener('change', function() {
                submitForm();
            });

            monthSelect.addEventListener('change', function() {
                submitForm();
            });

            function updateMonths(year, keepSelectedMonth = false) {
                fetch(`/mutabaah/months?year=${year}`)
                    .then(response => response.json())
                    .then(data => {
                        const currentSelectedMonth = keepSelectedMonth ? monthSelect.value : '';

                        monthSelect.innerHTML = '';
                        if (data.length > 0) {
                            let monthFound = false;
                            data.forEach((month) => {
                                const option = document.createElement('option');
                                option.value = month.month;
                                option.textContent = month.month_name;
                                monthSelect.appendChild(option);

                                if (month.month.toString() === currentSelectedMonth) {
                                    option.selected = true;
                                    monthFound = true;
                                }
                            });

                            if (!monthFound) {
                                monthSelect.value = data[0].month;
                            }
                        } else {
                            const option = document.createElement('option');
                            option.value = '';
                            option.textContent = 'Tidak ada bulan untuk tahun ini';
                            monthSelect.appendChild(option);
                        }
                    })
                    .catch(error => console.error('Error fetching months:', error));
            }

            yearSelect.addEventListener('change', function() {
                updateMonths(this.value, false);
            });

            if (yearSelect.options.length > 0) {
                updateMonths(yearSelect.value, true);
            }
        });
    </script>
</body>

</html>
