@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ route('adminsantri') }}">IB Data</a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <h4 class="sidebar-title">Menu</h4>
                        <li class="sidebar-item ">
                            <a href="{{ route('admindashboard') }}" class='sidebar-link '>
                                <i class="bi bi-grid-fill"></i>
                                <p class="dika ml-4">Dashboard</p>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('santri') }}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <p class="dika ml-4">Data Santri</p>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                                <i class="bi bi-exclamation-triangle"></i>
                                <p class="dika ml-4">Pelanggaran</p>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('prestasi') }}" class='sidebar-link'>
                                <i class="bi bi-trophy"></i>
                                <p class="dika ml-4">Prestasi</p>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href="{{ route('adminmutabaah') }}" class='sidebar-link'>
                                <i class="bi bi-calendar"></i>
                                <p class="dika ml-4">Mutabaah Santri</p>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('nilai') }}" class='sidebar-link'>
                                <i class="bi bi-paper fill"></i>
                                <p class="dika ml-4">Nilai Santri</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('include.header')
            <div id="main-content">
                <div class="table-card prestasi-card-container">
                    <div class="text-center rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-3">Data Mutabaah Santri</h3>
                        </div>
                    </div>

                    <!-- Dropdown for selecting month -->
                    <div class="mb-3">
                        <!-- Form untuk memilih santri, bulan, dan tahun -->
                        <form method="GET" action="{{ route('adminmutabaah') }}" id="mutabaahForm">
                            <div class=" float-left">
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($santri as $s)
                                        <option value="{{ $s->id }}"
                                            {{ $s->id == $selectedUserId ? 'selected' : '' }}>
                                            {{ $s->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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

                    <div class="card-body mb-5">
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
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($mutabaah as $item)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
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
        @include('include.bagianbawah')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userSelect = document.getElementById('user_id');
            const yearSelect = document.getElementById('tahun');
            const monthSelect = document.getElementById('bulan');
            const form = document.getElementById('mutabaahForm');

            userSelect.addEventListener('change', function() {
                updateYearsAndMonths(this.value);
            });

            yearSelect.addEventListener('change', function() {
                updateMonths(userSelect.value, this.value);
            });

            monthSelect.addEventListener('change', function() {
                form.submit(); // Otomatis submit form setelah bulan berubah
            });

            function updateYearsAndMonths(userId) {
                fetch(`/adminmutabaah/years?user_id=${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        yearSelect.innerHTML = '';
                        data.forEach(year => {
                            const option = document.createElement('option');
                            option.value = year.year;
                            option.textContent = year.year;
                            yearSelect.appendChild(option);
                        });
                        updateMonths(userId, yearSelect.value);
                    })
                    .catch(error => console.error('Error fetching years:', error));
            }

            function updateMonths(userId, year) {
                fetch(`/adminmutabaah/months?user_id=${userId}&year=${year}`)
                    .then(response => response.json())
                    .then(data => {
                        monthSelect.innerHTML = '';
                        data.forEach(month => {
                            const option = document.createElement('option');
                            option.value = month.month;
                            option.textContent = month.month_name;
                            monthSelect.appendChild(option);
                        });
                        form.submit(); // Otomatis submit form setelah memperbarui bulan
                    })
                    .catch(error => console.error('Error fetching months:', error));
            }
        });
    </script>
</body>

</html>
