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
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Giỏ hàng của bạn</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
      <?php $totalcart=0; ?>
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post" action="{{ url('update-cart') }}"> 
                  @csrf
                  <div class="site-blocks-table">
                    <table class="table">
                      @if ($temp_cart->isEmpty() || $temp_cart->first()->customer_id === null)
                          <h1>Bạn không có sản phẩm nào giỏ hàng</h1>
                      @else
                      <thead>
                        <tr>
                          <th class="product-thumbnail"></th>
                          <th class="product-name">Sản phẩm</th>
                          <th class="product-price">Giá</th>
                          <th class="product-quantity">Số lượng</th>
                          <th class="product-count">Kho</th>
                          <th class="product-total">Tổng tiền</th>
                          <th class="product-remove">Hủy</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($temp_cart as $temp_cart)
                        <tr>
                          <td class="product-thumbnail">
                            <img src="{{ asset('storage/' .$temp_cart->image) }}" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{ $temp_cart->product_title }}</h2>
                          </td>
                          <td>{{$temp_cart->price}}</td>
                          <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                              </div>
                              <input type="text" name="new_quantity{{ $temp_cart->product_id }}" class="form-control text-center quantity-amount" value="{{$temp_cart->temp_quantity}}" min="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                              </div>
                            </div>
                          </td>
                          <td>
                                {{-- Check if product count exists for the current product ID --}}
                                @if(isset($productCounts[$temp_cart->product_id]))
                                  {{ $productCounts[$temp_cart->product_id] }}
                                @else
                                  0
                                @endif  
                          </td>
                          <td>{{ $temp_cart->total_price }}</td>
                          <td><a href="{{ url('remove_cart', $temp_cart->id) }}" class="btn btn-black btn-sm" onclick="return confirm('Bạn có muốn xóa sản phẩm ?')">X</a></td>
                        </tr>
                        <?php $totalcart=$totalcart+$temp_cart->total_price; ?>
                        @endforeach
                      </tbody>
                      @endif
                    </table>
                    @if(session('error'))
                      <span class= "text-danger" style="color: #FF3030;">{{ session('error') }}</span>
                    @endif
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                    @if ($totalcart !== 0)
                     <input type="submit" value="Cập nhật giỏ hàng" class="btn btn-black btn-sm btn-block">
                    @endif
                    </div>
                  </div>
          </form>
                  <div class="row">
                    <div class="col-md-12"></div>
                    <div class="col-md-8 mb-3 mb-md-0"></div>
                    <div class="col-md-4"></div>
                  </div>
                </div>
               
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">TỔNG GIỎ HÀNG</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        {{-- <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$230.00</strong>
                        </div> --}}
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Tổng tiền</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">{{ $totalcart }}</strong>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          @if ($totalcart !== 0)
                            <a href="{{ url('checkout') }}" class="btn btn-black btn-lg py-3 btn-block">Kiểm tra thông tin</a>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
   
		@include('Customer.CustomerLayouts.footer')

		<script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
	</body>

