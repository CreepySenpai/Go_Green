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

		@include('front.CustomerLayouts.header')

		<!-- Start Hero Section -->
			<div class="hero">
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
									<a href="#" class="btn btn-white-outline">Ống hút</a>
									<a href="#" class="btn btn-white-outline">Cốc giấy mang đi</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

			<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
					@foreach ($products as $product)
		      		<!-- Start Column 1 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="{{ asset('front-assets/images/' .$product->hinh_anh) }}" class="img-fluid product-thumbnail">

							<h3 class="product-title">{{$product->ten_sp}}</h3>
							<strong class="product-price">{{$product->gia}} VND</strong>

							<span class="icon-cross">
								<img src="{{ asset('front-assets/images/cross.svg') }}" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 1 -->
					@endforeach
		      	</div>
		    </div>
		</div>
		
	
		@include('front.CustomerLayouts.footer')

		<script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
	</body>

</html>
