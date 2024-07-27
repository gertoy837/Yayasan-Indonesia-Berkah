@extends('../../include/sidebar')

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IB - Dashboard</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ 'template/dist' }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ 'template/dist' }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="{{ 'template/dist' }}/assets/compiled/css/iconly.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<style>
    #calendar {
        max-width: 90%;
        margin: 20px auto;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .fc-toolbar.fc-header-toolbar {
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .fc-daygrid-day {
        min-height: 80px;
    }

    .fc-daygrid-event {
        background-color: #007bff;
        color: #fff;
        padding: 2px 4px;
        border-radius: 3px;
    }

    #close-calendar {
        display: block;
        margin: 0 auto 10px;
        padding: 5px 10px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
</style>

<body>
    <script src="{{ asset('template/dist/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        @section('sidebar-menu')
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
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
                <li class="sidebar-item">
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
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Dashboard Donatur</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold"><a href=""
                                                        data-bs-toggle="modal" data-bs-target="#tambahsantri">Total
                                                        Santri</a></h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalSantri }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold"><a href=""
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#tambahprestasi">Prestasi</a></h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalprestasi }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold"><a href=""
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#tambahpelanggaran">Melanggar</a></h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalpelanggaran }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Prestasi</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="bar"></div>
                                        <button id="close-calendar calendar-container"
                                            style="margin: 10px; display:none;">Close</button>
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Melanggar</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-europe"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="user-menu d-flex">
                                                <div class="avatar avatar-xl">
                                                    <img src="{{ asset('template/dist') }}/assets/compiled/jpg/1.jpg"
                                                        alt="Face 1">
                                                </div>
                                                <div class="ms-3 name">
                                                    <h6 class="font-bold mt-2">{{ Auth::user()->nama_lengkap }}</h6>
                                                    <label class="text-muted mb-0">Log <code>Out? </code></label>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end x-slot"
                                            aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                            <li>
                                                <h6 class="dropdown-header">Hello, {{ Auth::user()->nama_lengkap }}</h6>
                                            </li>
                                            <li><x-dropdown-link :href="route('profile.edit')" class="dropdown-item"><i
                                                        class="icon-mid bi bi-gear me-2"></i>
                                                    {{ __('Setting') }}
                                                </x-dropdown-link></li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="dropdown-item" href="#" :href="route('logout')"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                                        {{ __('Log Out') }}
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Gender</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; IB - Dashboard</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="#">IB</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('template/dist/assets') }}/static/js/components/dark.js"></script>
    <script src="{{ asset('template/dist/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>
    <script src="{{ asset('template/dist/assets') }}/extensions/apexcharts/apexcharts.min.js"></script>
    <script>
        var options = {
            series: [{
                name: 'Prestasi',
                data: @json(array_values($monthlyPrestasi))
            }, {
                name: 'Pelanggaran',
                data: @json(array_values($monthlyPelanggaran))
            }],
            chart: {
                type: 'bar',
                height: 350,
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        var month = config.dataPointIndex + 1;
                        loadCalendar(month);
                    }
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val;
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#bar"), options);
        chart.render();

        var calendar; // Define the calendar variable in the outer scope

        function loadCalendar(month) {
            fetch(`/get-dates-by-month/${month}`)
                .then(response => response.json())
                .then(data => {
                    var prestasiEvents = data.prestasiDates.map(date => ({
                        title: 'Prestasi',
                        start: date
                    }));

                    var pelanggaranEvents = data.pelanggaranDates.map(date => ({
                        title: 'Pelanggaran',
                        start: date
                    }));

                    if (calendar) { // If the calendar exists, destroy it
                        calendar.destroy();
                    }

                    var calendarEl = document.getElementById('calendar');
                    calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        initialDate: moment().month(month - 1).format(
                            'YYYY-MM-DD'), // Set the initial date to the selected month
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: ''
                        },
                        events: [...prestasiEvents, ...pelanggaranEvents]
                    });

                    calendar.render();
                    document.getElementById('calendar-container').style.display = 'block';
                });
        }

        document.getElementById('close-calendar').addEventListener('click', function() {
            document.getElementById('calendar-container').style.display = 'none';
        });
    </script>

    {{-- Gender --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let genderData = @json($genderData);

        let optionsVisitorsProfile = {
            series: [genderData.Ikhwan || 0, genderData.Akhwat || 0],
            labels: ["Ikhwan", "Akhwat"],
            colors: ["#435ebe", "#55c6e8"],
            chart: {
                type: "donut",
                width: "100%",
                height: "350px",
            },
            legend: {
                position: "bottom",
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "30%",
                    },
                },
            },
        };

        var chartVisitorsProfile = new ApexCharts(
            document.getElementById("chart-visitors-profile"),
            optionsVisitorsProfile
        );
        chartVisitorsProfile.render();
    </script>
    <script>
        var optionsEurope = {
            series: [{
                name: "series1",
                data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
            }, ],
            chart: {
                height: 80,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            colors: ["#5350e9"],
            stroke: {
                width: 2,
            },
            grid: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2018-09-19T00:00:00.000Z",
                    "2018-09-19T01:30:00.000Z",
                    "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z",
                    "2018-09-19T04:30:00.000Z",
                    "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z",
                    "2018-09-19T07:30:00.000Z",
                    "2018-09-19T08:30:00.000Z",
                    "2018-09-19T09:30:00.000Z",
                    "2018-09-19T10:30:00.000Z",
                    "2018-09-19T11:30:00.000Z",
                ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                },
            },
            show: false,
            yaxis: {
                labels: {
                    show: false,
                },
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy HH:mm",
                },
            },
        }
        var chartEurope = new ApexCharts(
            document.querySelector("#chart-europe"),
            optionsEurope
        )
        chartEurope.render()
    </script>

    {{-- IMPORT KC --}}
    <script>
        // Keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            // ctrl + alt + l for Pelanggaran Import
            if (event.ctrlKey && event.altKey && event.key === 'l') {
                event.preventDefault();
                $('#pelanggaranImportModal').modal('show');
            }

            // ctrl + alt + r for Prestasi Import
            if (event.ctrlKey && event.altKey && event.key === 'r') {
                event.preventDefault();
                $('#prestasiImportModal').modal('show');
            }

            // ctrl + alt + a for Add Santri
            if (event.ctrlKey && event.altKey && event.key === 'a') {
                event.preventDefault();
                $('#addSantriModal').modal('show');
            }

            // ctrl + alt + s for Santri Import
            if (event.ctrlKey && event.altKey && event.key === 's') {
                event.preventDefault();
                $('#santriImportModal').modal('show');
            }
        });
    </script>
</body>

</html>
