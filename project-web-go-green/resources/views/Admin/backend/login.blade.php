<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đăng Nhập</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}" />

    <style>
        .form-check-label {
            cursor: pointer;
        }

        .animated-checkbox {
            position: relative;
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
        }

        .animated-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
        }

        .animated-checkbox span {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 15px;
            border-radius: 15px;
            background-color: #ccc;
            transition: background-color 0.3s;
        }

        .animated-checkbox span:after {
            content: '';
            position: absolute;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .animated-checkbox input[type="checkbox"]:checked+span {
            background-color: #4CAF50;
        }

        .animated-checkbox input[type="checkbox"]:checked+span:after {
            transform: translateX(15px);
        }
    </style>
</head>

<body>

    <div>
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

                </div>
            </div>

        </nav>

    </div>

    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-12 mx-auto tm-login-col">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">

                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $er)
                                    <li> {{$er}} </li>
                                    @endforeach
                                </ul>
                            </div>

                            @endif


                            <form method="post" class="tm-login-form">
                                {{csrf_field()}}

                                @include('errors.error')
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control validate" id="email" value="{{ old('email') }}" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control validate" id="password" value="" required />
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label animated-checkbox" for="rememberMe">
                                        <input type="checkbox" class="form-check-input" id="rememberMe" value="Remember Me">
                                        <span></span>
                                        Remember Me
                                    </label>
                                </div>
                                <!-- <div class="checkbox">
                        <label style="color: rgb(240, 248, 255);">
                            <input type="checkbox" name="remember" id="" value="Remember Me"> Remember Me
                        </label>
                  </div> -->
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                        Login
                                    </button>
                                </div>
                                <button class="mt-5 btn btn-primary btn-block text-uppercase">
                                    Forgot your password?
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2018</b> All rights reserved.

                Design: <a rel="nofollow noopener" href="" class="tm-footer-link">Template Mo</a>
            </p>
        </div>
    </footer>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
