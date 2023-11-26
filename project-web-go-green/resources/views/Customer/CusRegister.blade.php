<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('front-assets/images/Logo_website.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/css/register.css') }}">
    <title>Go!Green Online Shop</title>
</head>

<body>
    <div class="container" id="container">

        <div class="form-container sign-up">
            <form action="{{ route('CusRegister.post') }}" method="post" name="registrationForm" id="registrationForm">
                @csrf
                <h1>Tạo tài khoản</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <input type="text" placeholder="Họ và tên" name="name" id="name">
                @if ($errors->has('name'))
                    <span class= "text-danger" style="color: #FF3030">{{$errors->first('name')}}</span>
                @endif
                <input type="email" placeholder="Email" name="email" id="email">
                @if(session('error'))
                    <span class= "text-danger" style="color: #FF3030">{{ session('error') }}</span>
                @endif
                @if ($errors->has('email'))
                    <span class= "text-danger" style="color: #FF3030">{{$errors->first('email')}}</span>
                @endif
                <input type="password" placeholder="Nhập mật khẩu" name="password" id="password">
                @if ($errors->has('password'))
                    <span class= "text-danger" style="color: #FF3030">{{$errors->first('password')}}</span>
                @endif
                {{-- <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation" id="password_confirmation"> --}}
                <button type="submit">Đăng ký</button>
                <a href="{{ url('shop') }}">Quay lại Shop</a>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Đăng nhập để đặt các sản phẩm ở go!green </p>
                    <a href="{{ url('CusLogin') }}"><button class="hidden" id="register">Đăng nhập</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
