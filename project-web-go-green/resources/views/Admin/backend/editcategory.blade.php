@extends('Admin.backend.master')
@section('title', 'Chỉnh Sửa Danh Mục')
@section('main')

<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Sửa Danh Mục</h2>
              </div>
            </div>

            @include('errors.error')

            <div class="row tm-edit-product-row">
              <div class="col-12">
                <form method="post" class="tm-edit-product-form">

                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Tên Danh Mục
                    </label>
                    <input
                      id="name"
                      name="cate_name"
                      type="text"
                      value="{{ $category->cate_name; }}"
                      class="form-control validate"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="des"
                      >Mô Tả</label
                    >
                    <textarea
                      id="des"
                      name="cate_des"
                      class="form-control validate tm-small"
                      rows="5"
                      required
                    > {{ $category->cate_des }}</textarea>
                  </div>

                  <div class="col-12">
                    <input type="submit" value="Cập Nhật" class="btn btn-primary btn-block text-uppercase" style="border-radius: 5px;">
                  </div>

                  <div class="mt-3 col-12">
                    <a href="{{ asset('admin/category') }}" class="btn btn-danger btn-block text-uppercase" style="border-radius: 5px; color: white;">Huỷ</a>
                  </div>
                  {{ csrf_field() }}
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop
