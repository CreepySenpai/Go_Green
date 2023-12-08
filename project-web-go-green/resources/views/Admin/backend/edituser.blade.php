@extends('Admin.backend.master')
@section('title', 'Chỉnh Sửa Danh Mục')
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
                <h4 class="page-title">Sửa Thông Tin Người Dùng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ asset('admin/category') }}">Người Dùng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa Thông Tin Người Dùng</li>
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
                    <form class="form-horizontal" method="post" id="addproductform" enctype="multipart/form-data">
                        <div class="card-body">
                            <h5 class="card-title">Sửa Thông Tin Người Dùng</h5>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3 m-t-15">Tên Người Dùng</label>
                                <div class="col-sm-9">
                                    <input name="user_name" type="text" class="form-control" id="fname" value="{{ $user->user_name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-md-3 m-t-15">Email</label>
                                <div class="col-sm-9">
                                    <input name="user_email" type="email" class="form-control" id="fname" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 m-t-15">Vai Trò</label>
                                <div class="col-md-9">
                                    <select name="user_role" class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                        @foreach($roleList as $role)
                                        <option value="{{ $role->role_id }}" @if($user->role_type == $role->role_id) selected @endif>
                                            {{ $role->role_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


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

@stop
