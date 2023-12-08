@extends('Admin.backend.master')
@section('title', 'Danh Mục Người Dùng')
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
                <h4 class="page-title">Người Dùng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Người Dùng</li>
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

    @if(session()->has('delete_user_success'))
    <script>
        toastr.success("{{ session('delete_user_success') }}", 'Thành Công!!');
    </script>
    @endif

    @if(session()->has('delete_user_error'))
    <script>
        toastr.error("{{ session('delete_user_error') }}", 'Thất Bại!!');
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
                        <h5 class="card-title">Danh Sách Người Dùng</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên Người Dùng</th>
                                        <th>Email</th>
                                        <th>Vai Trò</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($userList as $user)
                                    <tr>
                                        <td>
                                            {{ $user->user_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @foreach($userRoleList as $role)
                                            @if($user->role_type == $role->role_id)
                                            {{ $role->role_name }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ asset('admin/user/edit/' . $user->user_id ) }}" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info"><i class="fas fa-pen-square"></i> Sửa</a>
                                                <a href="{{ asset('admin/user/delete/' . $user->user_id ) }}" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                                            </div>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tên Người Dùng</th>
                                        <th>Email</th>
                                        <th>Vai Trò</th>
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
