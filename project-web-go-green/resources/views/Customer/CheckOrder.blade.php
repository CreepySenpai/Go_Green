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
		
		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
							
					
                        <tr>
                          <th class="product-thumbnail">Tên người nhận</th>
                          <th class="product-name">Mã đơn hàng</th>
                          <th class="product-price">Số điện thoại</th>
                          <th class="product-quantity">Địa chỉ nhận hàng</th>
                          <th class="product-total">Tổng tiền</th>
                          <th class="product-status">Trạng thái</th>
                          <th class="product-remove">Hủy đơn hàng</th>
                        </tr>
                      </thead>
                      <tbody>
						@foreach ($order as $order)
                        <tr>
                          <td class="product-thumbnail">
							<h2 class="h5 text-black">{{$order->name}}</h2>
                          </td>
                          <td>{{$order->order_code}}</td>
                          <td>{{$order->phone}}</td>
                          <td>{{$order->address}}</td>
                          <td>{{$order->price}} VND</td>
						  <td>{{$order->status_order}}</td>
                          <td><a href="{{url('remove_order', $order->id)}}" class="btn btn-black btn-sm" onclick="return confirm('Bạn có muốn hủy đơn hàng này không?')">X</a></td>
                        </tr>
						@endforeach
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
          </div>
		</div>
		@include('Customer.CustomerLayouts.footer')

		<script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
	</body>

</html>