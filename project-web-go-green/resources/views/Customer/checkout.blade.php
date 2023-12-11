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

		<div class="untree_co-section">
			<form action="{{ route('CheckOrder.post') }}" method="post">
			@csrf
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Vui lòng điền thông tin sau</h2>
		          <div class="p-3 p-lg-5 border bg-white">
					<div class="form-group row">
						<div class="col-md-12">
						  <label for="c_address" class="text-black">Tên người nhận<span class="text-danger">*</span></label>
						  <input type="text" class="form-control" id="c_address" name="c_name" placeholder="Họ và tên">
						  @if(session('error'))
						  <span class= "text-danger" style="color: #FF3030;">{{ session('error') }}</span>
						  @endif
						</div>
					  </div>
				

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Địa chỉ<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Địa chỉ">
						@if(session('error'))
						<span class= "text-danger" style="color: #FF3030;">{{ session('error') }}</span>
						@endif
		              </div>
		            </div>
				
		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Số điện thoại<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Số điện thoại">
						@if(session('error'))
						<span class= "text-danger" style="color: #FF3030;">{{ session('error') }}</span>
						@endif
		              </div>
		            </div>

		            <div class="form-group">
		              <div class="collapse" id="ship_different_address">
		                <div class="py-2">

		                  <div class="form-group">
		                    <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
		                    <select id="c_diff_country" class="form-control">
		                      <option value="1">Select a country</option>    
		                      <option value="2">bangladesh</option>    
		                      <option value="3">Algeria</option>    
		                      <option value="4">Afghanistan</option>    
		                      <option value="5">Ghana</option>    
		                      <option value="6">Albania</option>    
		                      <option value="7">Bahrain</option>    
		                      <option value="8">Colombia</option>    
		                      <option value="9">Dominican Republic</option>    
		                    </select>
		                  </div>


		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
		                    </div>
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-12">
		                      <label for="c_diff_companyname" class="text-black">Company Name </label>
		                      <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
		                    </div>
		                  </div>

		                  <div class="form-group row  mb-3">
		                    <div class="col-md-12">
		                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
		                    </div>
		                  </div>

		                  <div class="form-group row mb-5">
		                    <div class="col-md-6">
		                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
		                    </div>
		                  </div>

		                </div>

		              </div>
		            </div>

		            {{-- <div class="form-group">
		              <label for="c_order_notes" class="text-black">Lời nhắn cho shop:</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"></textarea>
		            </div> --}}
		          </div>
		        </div>


		          <div class="col-md-6">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Hóa đơn của bạn</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
		                  <tbody>
                            <?php $totalcart=0 ?>
                            @foreach ($temp_cart as $item)
                            <tr>
                                <td>{{ $item->product_title }} <strong class="mx-2">x</strong> {{ $item->temp_quantity }}</td>
                                <td>{{ $item->total_price }}</td>
                            </tr>
                            <?php $totalcart= $totalcart + $item->total_price ?>
                            @endforeach
                        <tr>
                            <td class="text-black font-weight-bold"><strong>Tổng hóa đơn</strong></td>
                            <td class="text-black font-weight-bold"><strong>{{ $totalcart }}</strong> VND</td>
                        </tr>
                 
		                  </tbody>
		                </table>
		                <div class="form-group">
						<input type="submit" value="Đặt Hàng" class="btn btn-black btn-lg py-3 btn-block">
		                </div>
		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		      <!-- </form> -->
			</form>
		    </div>
		</div>


		@include('Customer.CustomerLayouts.footer')

		<script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('front-assets/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('front-assets/js/custom.js') }}"></script>
	</body>

</html>