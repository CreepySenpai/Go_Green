@extends('Admin.backend.master')
@section('title', 'Sản Phẩm')
@section('main')

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<div class="container mt-5">
    <div class="row">
        <!-- Product 1 -->
        @foreach($products as $product)

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage' . $product->product_image) }}" style="width: 350px; height: 300px" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text"> <?php echo substr(str_replace('"', '', $product->product_desc), 0, 30); ?></p>
                    <p class="card-text"><strong>Giá:</strong> {{ number_format($product->product_price, 0, ',', '.') }} VND</p>
                    <p class="card-text"><strong>Số Lượng:</strong> {{ $product->product_count }} </p>
                    <div class="btn-group" role="group">
                        <a href="{{ asset('admin/product/edit/'.$product->product_id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ asset('admin/product/delete/'.$product->product_id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>

@stop
