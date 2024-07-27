<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIB - Dashboard</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ 'template/dist' }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ 'template/dist' }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="{{ 'template/dist' }}/assets/compiled/css/iconly.css">

    {{-- Chart Bar --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts">
</head>

<style>
    /* Minimalist calendar styles */
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
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <p class="fs-4 p-0 m-0 mt-2">PIB Data</p>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item active">
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
                        <li class="sidebar-item ">
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
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Dashboard Admin</h3>
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
                                                <h6 class="text-muted font-semibold">
                                                    <a href="{{ route('adminsantri') }}">Total Santri</a>
                                                </h6>
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
                                                <h6 class="text-muted font-semibold">
                                                    <a href="{{ route('adminprestasi') }}">Prestasi</a>
                                                </h6>
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
                                                <h6 class="text-muted font-semibold">
                                                    <a href="{{ route('adminpelanggaran') }}">Melanggar</a>
                                                </h6>
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
                                                <h6 class="dropdown-header">Hello, {{ Auth::user()->nama_lengkap }}
                                                </h6>
                                            </li>
                                            <li><x-dropdown-link :href="route('profile.edit')" class="dropdown-item"><i
                                                        class="icon-mid bi bi-person me-2"></i>
                                                    {{ __('Settings') }}
                                                </x-dropdown-link></li>
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="dropdown-item" href="#" :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"><i
                                                            class="icon-mid bi bi-box-arrow-left me-2"></i>{{ __('Log Out') }}</a>
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
                        <p>2024 &copy; PIB</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="#">BI</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('template/dist/assets') }}/static/js/components/dark.js"></script>
    <script src="{{ asset('template/dist/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="{{ asset('template/dist/assets') }}/compiled/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('template/dist/assets') }}/extensions/apexcharts/apexcharts.min.js"></script>



    {{-- Pelanggarab & Prestasi --}}
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
</body>

</html>
