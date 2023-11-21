<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ asset('front-assets/images/Logo_website.png') }}">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('front-assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('front-assets/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ asset('front-assets/css/style.css') }}" rel="stylesheet">
		<title>Go!Green Online Shop</title>
	</head>
		
	<body>

		@include('Customer.CustomerLayouts.header')

		<!-- Start Hero Section -->
			{{-- <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="intro-excerpt">
								<p>
									@foreach ($cate as $category)
									<a href="#" class="btn btn-white-outline">{{ $category->cate_name }}</a>
									@endforeach
							</div>
						</div>
					</div>
				</div>
			</div> --}}
		<!-- End Hero Section -->

        
		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-2"><img src="{{ asset('front-assets/images/' .$product->product_image) }}" alt="" width="500px" height="500px"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">{{$product->product_name}}</h2>
						<p>{{$product->product_desc}}</p>

						{{-- <ul class="list-unstyled custom-list my-4">
							<li>Giao hàng nhanh</li>
							<li>Thân thiện với môi trường</li>
							<li>Giá cả hợp lý</li>
							<li>Chung tay vì trái đất xanh</li>
						</ul> --}}
						<p><a herf="#" class="btn">Thêm vào giỏ hàng</a><a herf="#" class="btn">Mua hàng</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->
	
		@include('Customer.CustomerLayouts.footer')

		<script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
	</body>

</html>
