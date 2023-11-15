@extends('Admin.backend.master')
@section('title', 'Thêm Sản Phẩm')
@section('main')


    <link rel="stylesheet" href="{{ asset('css/custom.css'); }}">
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Thêm Sản Phẩm</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
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
                                    rows="10"
                                    name="description"
                                    ></textarea>

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
                                <!-- <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <option selected>Chọn Danh Mục</option>

                                        @foreach($categoryList as $category)

                                        <option value="{{ $category->cate_id; }}"> {{ $category->cate_name }}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="row">
                                    <!-- <div class="form-group mb-3 col-xs-12 col-sm-6">
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
                                        </div> -->
                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                            for="stock"
                                            >Số Lượng
                                        </label>
                                        <input
                                            id="stock"
                                            name="count"
                                            type="number"
                                            class="form-control validate"
                                            required
                                        />

                                        </div>

                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label
                                            for="stock"
                                            >Giá
                                        </label>
                                        <input
                                            id="stock"
                                            name="price"
                                            type="number"
                                            class="form-control validate"
                                            required
                                        />

                                        </div>

                                </div>

                                <label for="">Thêm Hình Ảnh</label>
                                <div class="container">

                                    <br>
                                    <div id="drop-area">
                                        <h3>Drag & Drop Images Here</h3>
                                        <p>or</p>
                                        <input type="file" name="image" id="fileInput" multiple>
                                    </div>

                                    <div id="image-container" class="row"></div>
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

        <script>
            ClassicEditor
                .create( document.querySelector( '#ckeditor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>

        <script src="{{ asset('js/draganddropimage.js') }}"></script>

    </body>

@stop
