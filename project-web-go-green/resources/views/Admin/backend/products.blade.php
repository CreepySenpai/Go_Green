@extends('Admin.backend.master')
@section('title', 'Sản Phẩm')
@section('main')

<!-- <div class="container mt-8">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">TÊN SẢN PHẨM</th>
                    <th scope="col">GIÁ</th>
                    <th scope="col">SÔ LƯỢNG</th>
                    <th scope="col">HÌNH ẢNH</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($products as $product)
                        <tr>
                            <th scope="row"><input type="checkbox" /></th>
                            <td class="tm-product-name">{{ $product->product_name }}</td>
                            <td> {{ $product->product_price }}</td>
                            <td> {{ $product->product_count }}</td>
                            <td><img src=" {{ asset('storage' . $product->product_image) }}" alt=" Một Cái Hình"></td>
                            <td>
                                <a href="{{ asset('admin/product/edit/'.$product->product_id) }}" class="tm-product-delete-link">
                                    <i class="far fa-edit tm-product-edit-icon"></i>
                                </a>
                                <a href="{{ asset('admin/product/delete/'.$product->product_id) }}" class="tm-product-delete-link">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach -->

                  <!-- <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Product 1</td>
                    <td>1,450</td>
                    <td>550</td>
                    <td>28 March 2019</td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr> -->

                <!-- </tbody>
              </table>
            </div> -->
            <!-- table container -->
            <!-- <a
              href="{{ asset('admin/product/add') }}"
              class="btn btn-primary btn-block text-uppercase mb-3">Thêm Sản Phẩm</a>
            <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button>
          </div>
        </div>

      </div>
    </div>

    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script> -->

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <div class="container mt-5">
        <div class="row">
            <!-- Product 1 -->
            @foreach($products as $product)

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage' . $product->product_image) }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_desc }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->product_price }}</p>
                        <p class="card-text"><strong>Quantity:</strong>${{ $product->product_count }}</p>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-info">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>

@stop
