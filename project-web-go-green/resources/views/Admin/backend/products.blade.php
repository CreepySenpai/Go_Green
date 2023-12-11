@extends('Admin.backend.master')
@section('title', 'Sản Phẩm')
@section('main')

<link rel="stylesheet" href="{{ asset('assets/libs/custom/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">



<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Danh Sách Sản Phẩm</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('edit_product_success'))
        <script>
            toastr.success("{{session('edit_product_success')}}", 'Thành Công!!');
        </script>
    @endif

    @if(session()->has('delete_product_success'))
        <script>
            toastr.success("{{session('delete_product_success')}}", 'Thành Công!!');
        </script>
    @endif

    <div class="border-top">
        <div class="card-body">
            <h5 class="card-title">Thay Đổi Chế Độ Hiển Thị</h5>
            <button type="button" class="btn btn-primary btn-lg" onclick="changeMode()">Thay Đổi</button>
        </div>
    </div>

    <div id="tableContent" class="container-fluid" style="display: block;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh Sách Sản Phẩm</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Hình Ảnh</th>
                                        <th>Ngày Thêm</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productList as $product)

                                    <tr>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_count }}</td>
                                        <td> <img style="width: 150px; height: 150px;" src="{{ asset('storage' . $product->product_image) }}" alt=""> </td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ asset('admin/product/edit/' . $product->product_id ) }}" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info"><i class="fas fa-pen-square"></i> Sửa</a>
                                                <a href="{{ asset('admin/product/delete/' . $product->product_id ) }}" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>

                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Hình Ảnh</th>
                                        <th>Ngày Thêm</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cảnh Báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn Có Chắc Muốn Xoá Sản Phẩm Này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thôi</button>
                    <button id="targetButton" type="button" class="btn btn-primary">Xoá</button>
                </div>
            </div>
        </div>
    </div>


    <div id="cardChange" class="container-fluid" style="display: none;">
        <div class="container mt-5">

            <div class="row">

                @foreach($productList as $product)

                <div class="col-md-4 mb-4">
                    <div class="card_c">
                        <img style="width: 300px; height: 300px;" src="{{ asset('storage' . $product->product_image) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title_c">{{ $product->product_name }}</h5>
                            <p class="card-text_c"> <?php echo substr(str_replace('"', '', $product->product_desc), 0, 200); ?></p>
                            <p class="card-text_c"><strong>Giá:</strong>{{ $product->product_price }} VND</p>
                            <p class="card-text_c"><strong>Số Lượng:</strong> {{ $product->product_count }}</p>
                            <div class="btn-group" role="group">
                                <a href="{{ asset('admin/product/edit/' . $product->product_id ) }}" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info"><i class="fas fa-pen-square"></i> Sửa</a>
                                <a href="{{ asset('admin/product/delete/' . $product->product_id ) }}" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

</div>

<script>
    // Default Init
    var productTableMode = 'card';
    var deleteProduct = 0;
</script>

<script>
    function changeMode() {
        if (productTableMode === 'card') {
            productTableMode = 'table';
            document.getElementById('tableContent').style.display = 'none';
            document.getElementById('cardChange').style.display = 'block';
        } else if (productTableMode == 'table') {
            productTableMode = 'card';
            document.getElementById('tableContent').style.display = 'block';
            document.getElementById('cardChange').style.display = 'none';
        }

    }

    document.getElementById('targetButton').addEventListener('click', (event) => {
        window.location.href = 'http://127.0.0.1:8000/admin/home/' + deleteProduct;
    });
</script>


<script>
    function checkSure() {
        const result = confirm("Bạn có chắc chắn muốn xóa không?");
        if (result) {
            return true;
        }
        return false;
    }
</script>

<script>

    const buttons = document.querySelectorAll('button');


    for (var button of buttons) {
        if (button.hasAttribute('value')) {
            button.addEventListener('click', (event) => {
                var btValue = event.target.value;
                deleteProduct = btValue;
                alert("You Press: " + deleteProduct);
            });
        }

    }

</script>
@stop
