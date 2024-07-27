@extends('../../include/adminsidebar')
@include('include.bagianatas')

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        @section('sidebar-menu')
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard.donatur') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('donatur.santri') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Data Santri</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('donatur.pelanggaran') }}" class='sidebar-link'>
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>Pelanggaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('donatur.prestasi') }}" class='sidebar-link'>
                        <i class="bi bi-trophy"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="sidebar-item active">
                    <a href="{{ route('donatur.mutabaah') }}" class='sidebar-link'>
                        <i class="bi bi-calendar"></i>
                        <span>Mutaba'ah Santri</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('donatur.nilai') }}" class='sidebar-link'>
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
                    <div class="">
                        <div class="d-flex align-content-center justify-content-between mb-3">
                            @foreach ($users as $item)
                                <h3>Data Mutabaah Santri {{ $item->nama_lengkap }}</h3>
                                <div class="">
                                    <a href="{{ route('donatur.mutabaah') }}" class="btn btn-md btn-secondary"
                                        id="addNewDataBtn">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add filter form -->
                        <form id="filterForm" action="{{ route('donatur.detailmutabaah', $id) }}" method="GET"
                            class="mb-3 d-flex justify-content-end gap-2">
                            <div class="">
                                <select name="bulan" id="monthSelect" class="form-select pe-5">
                                    @foreach ($months as $month)
                                        <option value="{{ $month->month }}"
                                            {{ $selectedMonth == $month->month ? 'selected' : '' }}>
                                            {{ $month->month_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <select name="tahun" id="yearSelect" class="form-select pe-5">
                                    @foreach ($years as $year)
                                        <option value="{{ $year->year }}"
                                            {{ $selectedYear == $year->year ? 'selected' : '' }}>
                                            {{ $year->year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="card-body mb-5">
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
                                        <th scope="col" colspan="2" style="white-space: nowrap; padding: 0 2rem">
                                            Sahur
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
        </div>
        @include('include.bagianbawah')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#yearSelect').change(function() {
                var year = $(this).val();
                var url = "{{ route('getMonths', ':id') }}".replace(':id', {{ $id }});

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        year: year
                    },
                    success: function(response) {
                        $('#monthSelect').empty();
                        $.each(response, function(index, month) {
                            $('#monthSelect').append($('<option>', {
                                value: month.month,
                                text: month.month_name
                            }));
                        });
                        // Select the first month and submit the form
                        $('#monthSelect').val($('#monthSelect option:first').val());
                        $('#filterForm').submit();
                    }
                });
            });

            $('#monthSelect').change(function() {
                $('#filterForm').submit();
            });
        });
    </script>
</body>

</html>
