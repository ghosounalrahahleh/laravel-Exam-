<?php
$myslqi = new mysqli('localhost', 'root', '', 'exam') or die(mysqli_error($myslqi));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard-@yield ('title', 'admain') </title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">


</head>

<body class="animsition">
    <div class="page-wrapper">
           <!-- HEADER MOBILE-->
           <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('img/logo2.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                            {{-- <li class="active has-sub">
                            <a class="js-arrow" href="">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('role.index') }}">
                                <i class="fas fa-table"></i>Manage Roles</a>
                        </li>
                        <li>
                            <a href="{{ route ('user.index') }}">
                                <i class="fas fa-table"></i>Manage Useres</a>
                        </li>
                        <li>
                            <a href=" {{ route('category.index') }}">
                                <i class="fas fa-table"></i>Manage Categories</a>
                        </li>
                        <li>
                            <a href=" {{ route('exam.index') }}">">
                                <i class="fas fa-table"></i>Manage Exam</a>
                        </li>
                        <li>
                            <a href="{{ route('question.index') }}">
                                <i class="fas fa-table"></i>Manage Questions</a>
                        </li>
                        <li>
                            <a href="{{ route('answer.index') }}">
                                <i class="fas fa-table"></i>Manage Answers</a>
                        </li>


                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo text-center">
                <a href="#">
                    <img width="30%" src="{{ asset('img/logo2.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        {{-- <li class="active has-sub">
                            <a class="js-arrow" href="">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('role.index') }}">
                                <i class="fas fa-table"></i>Manage Roles</a>
                        </li>
                        <li>
                            <a href="{{ route ('user.index') }}">
                                <i class="fas fa-table"></i>Manage Useres</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">
                                <i class="fas fa-table"></i>Manage Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('exam.index') }}">
                                <i class="fas fa-table"></i>Manage Exam</a>
                        </li>
                        <li>
                            <a href="{{ route('question.index') }}">
                                <i class="fas fa-table"></i>Manage Questions</a>
                        </li>
                   

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop"
>

                <div class="section__content section__content--p30">

                </div>
            </header>
            <!-- HEADER DESKTOP-->
