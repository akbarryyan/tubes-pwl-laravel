<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Taplox: An advanced, fully responsive admin dashboard template packed with features to streamline your analytics and management needs." />
    <meta name="author" content="StackBros" />
    <meta name="keywords" content="Taplox, admin dashboard, responsive template, analytics, modern UI, management tools" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow" />
    <meta name="theme-color" content="#ffffff">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Google Font Family link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor css -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>

    <!-- START Wrapper -->
    <div class="app-wrapper">

        @include('layout.header')

        @include('layout.menu')

        @yield('content')

        @include('layout.footer')