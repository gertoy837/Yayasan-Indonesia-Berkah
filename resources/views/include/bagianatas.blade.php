<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IB Data</title>


    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <script src="https://kit.fontawesome.com/14732ec0b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- Toastify --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <script src="https://kit.fontawesome.com/14732ec0b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Home Template -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('templatemo') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('templatemo') }}/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{ asset('templatemo') }}/assets/css/animated.css">
    <link rel="stylesheet" href="{{ asset('templatemo') }}/assets/css/owl.css">
</head>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        height: 100%;
        width: 100%;
    }


    /* Tema Gelap */
    body.theme-forest {
        background-image: url('template/dist/assets/images/malam.jpg');
        background-size: cover;
        color: #fff;
    }

    body.theme-forest .sidebar-wrapper {
        background-color: rgba(255, 255, 255, 0);
    }

    body.theme-forest .navbar,
    body.theme-forest .card {
        background-color: rgba(0, 0, 0, 0);
        color: #fff;
    }

    body.theme-forest .card-body {
        color: #fff;
    }

    body.theme-forest .card-data {
        margin-left: 20px;
        margin-bottom: 20px;
        margin-right: 20px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.409);
        box-shadow: #4343433b;
    }

    body.theme-forest .table-card {
        background-color: rgba(255, 255, 255, 0.745);
        border-radius: 20px;
    }

    body.theme-forest .santri-table-card {
        background-color: rgba(255, 255, 255, 0.745);
        border-radius: 20px;
    }

    body.theme-forest .dika {
        color: white;
    }

    body.theme-forest .teks1 {
        color: black;
    }

    body.theme-forest .sidebar-title {
        color: white;
    }

    body.theme-forest ul li {
        color: rgb(255, 255, 255);
        margin: 5px;
    }

    .form-control::placeholder {
        color: white;
        opacity: 1;
        /* Mengatur opacity jika dibutuhkan */
    }



    /* Tema Pemandangan */
    body.theme-ricefield {
        background-image: url('template/dist/assets/images/pemandangan1.jpg');
        background-size: cover;
        color: #fff;
    }

    body.theme-ricefield .sidebar-wrapper {
        background-color: rgba(255, 255, 255, 0.194);
    }

    body.theme-ricefield .navbar,
    body.theme-ricefield .card {
        background-color: rgba(0, 0, 0, 0);
        color: #fff;
    }

    body.theme-ricefield .card-body {
        color: #fff;
    }

    body.theme-ricefield .card-data {
        margin-left: 20px;
        margin-bottom: 20px;
        margin-right: 20px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.409);
        box-shadow: #4343433b;
    }

    body.theme-ricefield .table-card {
        background-color: rgba(255, 255, 255, 0.745);
        border-radius: 20px;
    }

    body.theme-ricefield .santri-table-card {
        background-color: rgba(255, 255, 255, 0.745);
        border-radius: 20px;
    }

    body.theme-ricefield .dika {
        color: white;
    }

    body.theme-ricefield .teks1 {
        color: black;
    }

    body.theme-ricefield .sidebar-title {
        color: white;
    }

    body.theme-ricefield ul li {
        color: rgb(255, 255, 255);
        margin: 5px;
    }

    .form-control::placeholder {
        color: white;
        opacity: 1;
        /* Mengatur opacity jika dibutuhkan */
    }

    /* Tema Salju */
    body.theme-snow {
        background-image: url('template/dist/assets/images/salju.jpg');
        background-size: cover;
        color: #000;
    }

    body.theme-snow .sidebar-wrapper {
        background-color: rgba(255, 255, 255, 0.2);
    }

    body.theme-snow .navbar,
    body.theme-snow .card {
        background-color: rgba(0, 0, 0, 0);
        color: #000;
    }

    body.theme-snow .card-body {
        color: #000;
    }

    body.theme-snow .card-data {
        margin-left: 20px;
        margin-bottom: 20px;
        margin-right: 20px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.409);
        box-shadow: #4343433b;
    }

    body.theme-snow .table-card {
        background-color: rgba(255, 255, 255, 0.745);
        border-radius: 20px;
    }

    body.theme-snow .dika {
        color: black;
    }

    body.theme-snow .sidebar-title {
        color: rgb(255, 255, 255);
    }

    body.theme-snow ul li {
        color: rgb(0, 0, 0);
        margin: 5px;
    }


    /* Tema Autumn */
    body.ricefield {
        background-image: url('template/dist/assets/images/pemandangan1.jpg');
        background-size: cover;
        color: #000;
    }

    body.ricefield .sidebar-wrapper {
        background-color: rgba(255, 255, 255, 0.2);
    }

    body.ricefield .navbar,
    body.ricefield .card {
        background-color: rgba(0, 0, 0, 0);
        color: #000;
    }

    body.ricefield .card-body {
        color: #000;
    }

    body.ricefield .card-data {
        margin-left: 20px;
        margin-bottom: 20px;
        margin-right: 20px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.409);
        box-shadow: #4343433b;
    }

    body.ricefield .table-card {
        background-color: rgba(255, 255, 255, 0.745);
        border-radius: 20px;
    }

    body.ricefield .dika {
        color: black;
    }

    body.ricefield .sidebar-title {
        color: black;
    }

    body.ricefield ul li {
        color: rgb(0, 0, 0);
        margin: 5px;
    }

    a {
        color: #0060B6;
        text-decoration: none;
    }

    a:hover {
        color: #00A0C6;
        text-decoration: none;
        cursor: pointer;
    }

    .card-container {
        height: 600px;
        overflow-y: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
        border-radius: 8px;
        padding: 20px;
    }

    .sticky {
        position: sticky;
    }

    /* .santri-card-container {
            height: 550px;
            background-color: rgba(255, 255, 255, 0);
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        } */

    .santri-card-container {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.5) transparent;
        height: 500px;
        overflow-y: auto;
        padding: 20px;
        /* direction: rtl */
    }

    .santri-card-container::-webkit-scrollbar {
        width: 8px;
    }

    .santri-card-container::-webkit-scrollbar-track {
        background: transparent;
    }

    .santri-card-container::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        border: 2px solid transparent;
        background-clip: content-box;
    }

    /* Prestasi Card Container */

    .prestasi-card-container {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.5) transparent;
        height: 600px;
        overflow-y: auto;
        padding: 20px;
    }

    .prestasi-card-container::-webkit-scrollbar {
        width: 8px;
    }

    .prestasi-card-container::-webkit-scrollbar-track {
        background: transparent;
    }

    .prestasi-card-container::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        border: 2px solid transparent;
        background-clip: content-box;
    }


    .sticky {
        position: sticky;
    }

    #clients {
        position: relative;
        top: 0;
    }



    /* Contoh styling tema */
    .theme-light {
        background-color: white;
    }

    .theme-dark {
        background-color: black;
        color: white;
    }

    .theme-forest {
        background-image: url('template/dist/assets/images/malam.jpg');
    }

    .theme-snow {
        background-image: url('template/dist/assets/images/salju.jpg');
    }

    .theme-ricefield {
        background-image: url('template/dist/assets/images/pemandangan.jpg');
    }


    .theme-preview {
        width: 100%;
        height: 100px;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        margin-bottom: 15px;
        cursor: pointer;
    }

    body.custom-theme .sidebar-wrapper {
        background-color: rgba(255, 255, 255, 0.275);
    }

    .theme-option {
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s;
    }

    .theme-option.active {
        border-color: #007bff;
    }

    .custom-theme-preview {
        position: relative;
        width: 100%;
        height: 100px;
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .upload-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100px;
        border: 2px dashed #007bff;
        border-radius: 8px;
        cursor: pointer;
        color: #007bff;
        font-size: 24px;
        transition: background-color 0.3s, color 0.3s;
    }

    .upload-button:hover {
        background-color: #007bff;
        color: #fff;
    }

    .hidden-input {
        display: none;
    }

    .delete-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 0, 0, 0.7);
        border: none;
        color: white;
        padding: 10px 10px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 16px;
        display: none;
        /* Hide by default */
    }

    .delete-button:hover {
        background: rgba(255, 0, 0, 1);
    }
</style>
