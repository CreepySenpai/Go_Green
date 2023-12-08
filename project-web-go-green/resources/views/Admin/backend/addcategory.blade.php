@extends('Admin.backend.master')
@section('title', 'Thêm Danh Mục')
@section('main')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">

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
                            <li class="breadcrumb-item"><a href="{{ asset('admin/category') }}">Danh Mục</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Danh Mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('add_category_success'))
    <script>
        toastr.success("{{ session('add_category_success') }}", 'Thành Công!!');
    </script>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $er)
        <script>
            toastr.error('{{$er}}', 'Error!');
        </script>
        @endforeach
    @endif


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
                    <form class="form-horizontal" method="post" id="addproductform" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">Thêm Danh Mục</h5>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3 m-t-15">Tên Danh Mục</label>
                                <div class="col-sm-9">
                                    <input name="cate_name" type="text" class="form-control" id="fname" placeholder="Tên Danh Mục">
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                        <label class="col-md-3">Chọn Hình Ảnh</label>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" accept="image/x-png,image/gif,image/jpeg">
                                                <label class="custom-file-label" for="validatedCustomFile">Chọn File...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>
                                    </div> -->
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Mô Tả Danh Mục</h4>
                            <!-- Create the editor container -->
                            <div id="editor" style="height: 300px;">

                            </div>
                        </div>
                        <textarea name="description" style="display: none;" id="hiddenAreaAddProduct"></textarea>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-primary" value="Tạo Ngay">
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

@stop
