@extends('Admin.backend.master')
@section('title', 'Danh Sách Đơn Hàng')
@section('main')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Đơn Hàng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đơn Hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('edit_user_success'))
    <script>
        toastr.success("{{ session('edit_user_success') }}", 'Thành Công!!');
    </script>
    @endif

    @if(session()->has('delete_order_success'))
    <script>
        toastr.success("{{ session('delete_order_success') }}", 'Thành Công!!');
    </script>
    @endif

    @if(session()->has('delete_order_error'))
    <script>
        toastr.error("{{ session('delete_order_error') }}", 'Thất Bại!!');
    </script>
    @endif

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh Sách Đơn Hàng</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên Người Dùng</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Sản Phẩm</th>
                                        <th>Số Tiền</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($orderList as $order)
                                    <tr>
                                        <td>
                                            {{ $order->name }}
                                        </td>
                                        <td>
                                            {{ $order->order_code }}
                                        </td>
                                        <td>
                                            {{ $order->customer_email }}
                                        </td>
                                        <td>
                                            {{ $order->phone }}
                                        </td>
                                        <td>
                                            {{ $order->address }}
                                        </td>
                                        <td>
                                            @foreach ($details[$order->order_code] as $detail)
                                            <p>- {{$detail->quantity}} <span>x</span> {{$detail->product_title}}.</p>
                                            @endforeach

                                        </td>
                                        <td>
                                            {{$order->price}}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('delivery', $order->id) }}" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info">Giao hàng</a>
                                                <a href="{{ asset('admin/order/delete/' . $order->id ) }}" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tên Người Dùng</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Sản Phẩm</th>
                                        <th>Số Tiền</th>
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
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    Designed and Developed by <a href="">OniChan</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

@stop
