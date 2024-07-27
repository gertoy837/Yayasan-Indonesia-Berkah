<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IB Data</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <script src="https://kit.fontawesome.com/14732ec0b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app-dark.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
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

    body.theme-forest .dika {
        color: white;
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
        color: black;
    }

    body.theme-snow ul li {
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
</style>
@yield('bagianatas')
