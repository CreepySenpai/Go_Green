@extends('Admin.backend.master')
@section('title', 'Danh Mục Sản Phẩm')
@section('main')


<div class="container tm-mt-big tm-mb-big" style="margin-left: 8% !important;">

<div class="row" style="width: 1300px !important">

  <!-- Add Category Block -->
  <div class="col-5">

    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
      <div class="row">
        <div class="col-12">
          <h2 class="tm-block-title d-inline-block">Thêm Danh Mục</h2>
        </div>
      </div>

    @include('errors.error')
      <div class="row tm-edit-product-row">

        <div class="col-12 col-lg-12 col-md-12">

          <form method="post" class="tm-edit-product-form">
            {{ csrf_field() }}
            <div class="form-group mb-3">
              <label
                for="name"
                >Tên Danh Mục
              </label>
              <input
                id="name"
                name="cate_name"
                type="text"
                class="form-control validate"
                required
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
                class="form-control validate"
                rows="3"
                required
              ></textarea>
            </div>

            <div class="col-12" style="text-align: center;">
                <input name="btn_submit" value="Thêm Ngay" type="submit" class="btn btn-primary btn-block text-uppercase" style="border-radius: 5px;">
            </div>
         </form>

        </div>
      </div>

    </div>


  </div>

  <!-- List Category -->


  <div class="col-6" style="margin-left: 5%;">
    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
      <div class="row">
        <div class="col-12">
          <h2 class="tm-block-title d-inline-block">Danh Sách Danh Mục</h2>
        </div>
      </div>

      <div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 20%;">
                        Tên
                    </th>

                    <th> Mô Tả </th>

                    <th> Tuỳ Chọn</th>
                </tr>
            </thead>
          <tbody>
            @foreach($categoryList as $category)
                <tr>
                    <td>{{ $category->cate_name }}</td>
                    <td>
                        {{ $category->cate_des }}
                    </td>
                    <td class="row">
                    <a href="{{ asset('admin/category/edit/'. $category->cate_id) }}" class="ml-3" style="background-color: orange; color: white; border-radius: 5px; width: 40px; text-align: center;">
                        <div>
                        Sửa
                        </div>
                    </a>
                    <a class="ml-3" href="{{ asset('admin/category/delete/'. $category->cate_id )}}" style="background-color: red; color: white; border-radius: 5px; width: 40px; text-align: center;"
                        onclick="return confirm('Bạn Có Chắc Muốn Xoá Danh Mục Này?')">
                        <span class=""></span>
                        Xoá

                    </a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>


</div>

@stop
