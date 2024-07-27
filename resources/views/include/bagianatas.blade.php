<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IB Data</title>
    <link rel="icon" href="{{ asset('templati') }}/assets/images/Ib-icon.png" />
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/compiled/css/app.css">
    <script src="https://kit.fontawesome.com/14732ec0b9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
