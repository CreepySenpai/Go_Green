@extends('Admin.backend.master')
@section('title', 'Chỉnh Sửa Danh Mục')
@section('main')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/libs/custom/custom.css'); }}"> -->

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sửa Danh Mục</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ asset('admin/category') }}">Danh Mục</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa Danh Mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('errors.error')
                    <form class="form-horizontal" method="post" id="editcategoryform" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">Sửa Danh Mục</h5>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3 m-t-15">Tên Danh Mục</label>
                                <div class="col-sm-9">
                                    <input name="cate_name" type="text" class="form-control" id="fname" value="{{ $category->cate_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Mô Tả Danh Mục</h4>
                            <!-- Create the editor container -->
                            <div id="editor" style="height: 300px;">
                                <?php echo str_replace('"', '', $category->cate_des); ?>
                            </div>
                        </div>
                        <textarea name="description" style="display: none;" id="hiddenAreaEditCategory"></textarea>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-primary" value="Thay Đổi">
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
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
        All Rights Reserved by Matrix-admin. Designed and Developed by Onichan
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<script src="{{ asset('js/draganddropimage.js') }}"></script>

@stop
