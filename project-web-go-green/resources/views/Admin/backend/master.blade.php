<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Go Green</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">

    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('js/popper.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/quill.min.js') }}"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>
</head>

<body id="reportsPage">
    <div class="" id="home">

        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="{{ asset('admin/home') }}">
                    <h1 class="tm-site-title mb-0">Trang Quản Trị</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('admin/home') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                Bảng Điều Khiển

                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span>
                                    Sản Phẩm <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ asset('admin/product') }}">Danh Sách Sản Phẩm</a>
                                <a class="dropdown-item" href="{{ asset('admin/product/add') }}">Thêm Sản Phẩm</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('admin/category') }}">
                                <i class="far fa-list-alt"></i>
                                Danh Mục
                            </a>
                        </li>

                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="d-flex align-items-center">
                                <span class="mr-2 text-white font-weight-bold">Xin Chào {{ Auth::user()->user_name }}</span>
                                <a class="nav-link" href="{{ asset('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-xs text-white"></i>
                                </a>
                            </div>
                        </li>
                    </ul>


                </div>
            </div>

        </nav>

        <!-- Slide Bar -->
        <!-- Main -->

        @yield('main')


        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved.

                    Design: <a rel="nofollow noopener" href="#" class="tm-footer-link">OniChan</a>
                </p>
            </div>
        </footer>
    </div>





</html>
