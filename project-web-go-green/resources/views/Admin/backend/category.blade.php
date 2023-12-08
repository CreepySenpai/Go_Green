@extends('Admin.backend.master')
@section('title', 'Danh Mục Sản Phẩm')
@section('main')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Danh Mục</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('edit_category_success'))
        <script>
            toastr.success( "{{ session('edit_category_success') }}", 'Thành Công!!');
        </script>
    @endif

    @if(session()->has('delete_category_success'))
        <script>
            toastr.success("{{ session('delete_category_success') }}", 'Thành Công!!');
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
                        <h5 class="card-title">Danh Sách Danh Mục</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên Danh Mục</th>
                                        <th>Mô Tả</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($categoryList as $category)
                                        <tr>
                                            <td>
                                                {{ $category->cate_name }}
                                            </td>
                                            <td>
                                                <?php echo str_replace('"', '', $category->cate_des); ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ asset('admin/category/edit/' . $category->cate_id ) }}" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info"><i class="fas fa-pen-square"></i> Sửa</a>
                                                    <a href="{{ asset('admin/category/delete/' . $category->cate_id ) }}" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tên Danh Mục</th>
                                        <th>Mô Tả</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </tfoot>
                            </table>
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
        All Rights Reserved by Matrix-admin. Designed and Developed by OniChan
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

@stop
