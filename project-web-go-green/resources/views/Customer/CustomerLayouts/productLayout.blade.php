				<!-- Start Hero Section -->
				<div class="hero">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-lg-5">
								<div class="intro-excerpt">
									<h1>
										Shop, xin chào 
										@if(session('LoginID'))
											{{ $info_user->cus_name }}
										@endif
									</h1>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="intro-excerpt">
									@foreach ($cate as $category)
										<a href="{{url('shoplist',$category->cate_slug)}}" class="btn btn-white-outline">{{ $category->cate_name }}</a>
									@endforeach
									
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- End Hero Section -->
				
			<div class="untree_co-section product-section before-footer-section">
				<div class="container">
					  <div class="row">
						{{-- <h1>Danh sách sản phẩm: {{ $category->cate_name }}</h1> --}}
						@foreach ($products as $product)
						  <!-- Start Column 1 -->
						<div class="col-12 col-md-4 col-lg-3 mb-5">
							<a class="product-item" href="{{url('product_details',$product->product_id)}}">
								<img src="{{ asset('storage/' .$product->product_image) }}" class="img-fluid product-thumbnail">
	
								<h3 class="product-title">{{ $product->product_name }}</h3>
								<strong class="product-price">{{ $product->product_price }} VND</strong>
	
								<span class="icon-cross">
									<img src="{{ asset('front-assets/images/cross.svg') }}" class="img-fluid">
								</span>
							</a>
						</div> 
						<!-- End Column 1 -->
						@endforeach
						 <!-- Pagination Links -->
						 {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
					  </div>
				</div>
			</div>