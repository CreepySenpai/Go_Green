<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('front-assets/images/Logo_website.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/css/login.css') }}">
    <title>Go!Green Online Shop</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('postCusLogin') }}" method="post" name="loginForm" id="loginForm">
                @csrf
          
                <h1>Đăng nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>hoặc sử dụng email và mật khẩu đã đăng ký</span>
                <input type="email" placeholder="Email" name="email" id="loginEmail">
                @if(session('error'))
                    <span class= "text-danger" style="color: #FF3030">{{ session('error') }}</span>
                @endif
                @if ($errors->has('email'))
                    <span class= "text-danger" style="color: #FF3030">{{$errors->first('email')}}</span>
                @endif
                <input type="password" placeholder="Nhập mật khẩu" name="password" id="loginPassword">
                @if ($errors->has('password'))
                    <span class= "text-danger" style="color: #FF3030">{{$errors->first('password')}}</span>
                @endif
                <a href="#">Quên mật khẩu</a>
                <button type="submit">Đăng nhập</button>
                <a href="{{ url('shop') }}">Quay lại Shop</a>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Hãy đăng ký để sử dụng tất cả các tính năng của trang web</p>
                    <a href="{{ url('CusRegister') }}"><button class="hidden" id="register">Đăng Ký</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
