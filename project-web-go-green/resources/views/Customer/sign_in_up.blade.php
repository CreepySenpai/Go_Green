<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('front-assets/images/Logo_website.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/css/sign_in_up.css') }}">
    <title>Go!Green Online Shop</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Tạo tài khoản</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <form action="" method="post">
                    <input type="text" placeholder="Họ và tên">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Nhập mật khẩu">
                    <input type="password" placeholder="Nhập lại mật khẩu">
                    <button>Đăng ký</button>
                </form>
                <a href="{{ url('shop') }}">Quay lại Shop</a>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Đăng nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>hoặc sử dụng email và mật khẩu đã đăng ký</span>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Nhập mật khẩu">
                <a href="#">Quên mật khẩu</a>
                <button>Đăng nhập</button>
                <a href="{{ url('shop') }}">Quay lại Shop</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Đăng nhập để đặt các sản phẩm ở go!green </p>
                    <button class="hidden" id="login">Đăng nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Hãy đăng ký để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="register">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('front-assets/js/sign_in_up.js') }}"></script>
</body>

</html>