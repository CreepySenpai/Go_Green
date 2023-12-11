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
							<div class="grid grid-2"><img src="{{ asset('storage/' .$product->product_image) }}" alt="" width="600px" height="600px"></div>
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
						<form action="{{ url('Cart', $product->product_id) }}" method="post">
							@csrf
							{{-- <input type="number" name="quantiny" value="1" min="1"> --}}
							<input type="submit" class="btn" value="Thêm vào giỏ hàng">
						</form>
						{{-- <p><a herf="{{ url('Cart') }}" class="btn">Thêm vào giỏ hàng</a></p> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->
		
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootdey">
<div class="col-md-12 bootstrap snippets">
<div class="panel">
  <div class="panel-body">
    <textarea class="form-control" rows="2"></textarea>
    <div class="mar-top clearfix">
      <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
      <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
      <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
      {{-- <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a> --}}
    </div>
  </div>
</div>
<div class="panel">
    <div class="panel-body">
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block">
      <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
      <div class="media-body">
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline"> Trần Quốc Bảo</a>
        </div>
        <p>consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        <div class="pad-ver">
          <div class="btn-group">
            <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
            <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
          </div>
          <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
        </div>
        <hr>
    <!-- End Newsfeed Content -->
      </div>
    </div>
    <!--===================================================-->
    <!-- End Newsfeed Content -->
  </div>
</div>
</div>
</div>

		@include('Customer.CustomerLayouts.footer')

		<script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
	</body>

</html>
