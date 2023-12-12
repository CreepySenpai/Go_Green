@extends('Admin.backend.master')
@section('title', 'Thêm Người Dùng')
@section('main')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/libs/custom/custom.css'); }}"> -->

    @if(session()->has('add_user_success'))
        <script>
            toastr.success("{{session('add_user_success')}}", 'Thành Công!!');
        </script>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $er)
        <script>
            toastr.error('{{$er}}', 'Error!');
        </script>
        @endforeach
    @endif

    <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Người Dùng</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{ asset('admin/user') }}">Người Dùng</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm Người Dùng</li>
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
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h5 class="card-title">Thêm Người Dùng</h5>
                                    <div class="form-group row">
                                            <label for="fname" class="col-md-3 m-t-15">Tên Người Dùng</label>
                                            <div class="col-sm-9">
                                                <input require name="name" type="text" class="form-control" id="fname" placeholder="Tên Người Dùng">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="fname" class="col-md-3 m-t-15">Email</label>
                                            <div class="col-sm-9">
                                                <input require name="email" type="email" class="form-control" id="fname" placeholder="Email">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="fname" class="col-md-3 m-t-15">Mật Khẩu</label>
                                            <div class="col-sm-9">
                                                <input require name="password" type="password" class="form-control" id="fname" placeholder="Mật Khẩu">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15">Vai Trò</label>
                                        <div class="col-md-9">
                                            <select require name="role" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                                @foreach($roleList as $role)
                                                    <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" class="btn btn-primary" value="Thêm Ngay">
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>

                </div>


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
