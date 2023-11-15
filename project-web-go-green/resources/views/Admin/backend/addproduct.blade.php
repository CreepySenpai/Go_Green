@extends('Admin.backend.master')
@section('title', 'Thêm Sản Phẩm')
@section('main')

    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Thêm Sản Phẩm</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            @include('errors.error')
                            <form method="post" class="tm-edit-product-form" enctype="multipart/form-data">

                                <div class="form-group mb-3">
                                    <label
                                    for="name"
                                    >Tên Sản Phẩm
                                    </label>
                                    <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="form-control validate"
                                    required
                                    />
                                </div>
                                <div class="form-group mb-3">
                                    <label
                                    for="description"
                                    >Mô Tả</label
                                    >
                                    <textarea
                                    id="ckeditor"
                                    class="form-control validate"
                                    rows="5"
                                    name="description"
                                    ></textarea>
                                    <!-- <script>
                                        var editor = CKEDITOR.replace('description', {
                                            language: 'vi',
                                            filebrowserImageBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script> -->
                                </div>
                                <div class="form-group mb-3">
                                    <label
                                    for="category"
                                    >Danh Mục</label
                                    >
                                    <select
                                    class="custom-select tm-select-accounts"
                                    id="category" name="category"
                                    >
                                    <option selected>Select category</option> 
                                    <option value=""> {{$data->cate_name}} </option>
                                    </select>
                                </div>
                                <!-- <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                            for="expire_date"
                                            >Expire Date
                                        </label>
                                        <input
                                            id="expire_date"
                                            name="expire_date"
                                            type="text"
                                            class="form-control validate"
                                            data-large-mode="true"
                                        />
                                        </div>
                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                            for="stock"
                                            >Units In Stock
                                        </label>
                                        <input
                                            id="stock"
                                            name="stock"
                                            type="text"
                                            class="form-control validate"
                                            required
                                        />
                                        </div>

                                </div> -->
                                <!-- <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                    <div class="tm-product-img-dummy mx-auto">
                                    <i
                                        class="fas fa-cloud-upload-alt tm-upload-icon"
                                        onclick="document.getElementById('fileInput').click();"
                                    ></i>
                                    </div>
                                    <div class="custom-file mt-3 mb-3">
                                    <input id="fileInput" type="file" style="display:none;" />
                                    <input
                                        type="button"
                                        class="btn btn-primary btn-block mx-auto"
                                        value="UPLOAD PRODUCT IMAGE"
                                        onclick="document.getElementById('fileInput').click();"
                                        name="image"
                                    />
                                    </div>
                                </div> -->

                                <div class="form-group mb-3">
                                    <label
                                    for="image"
                                    >Hình Ảnh
                                    </label>
                                    <input type="file" name="image" id="image">
                                </div>

                                <div class="col-12">

                                    <input type="submit" class="btn btn-primary btn-block text-uppercase" value="Thêm Ngay">
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script> -->

@stop
