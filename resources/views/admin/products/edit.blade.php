@extends('admin.admin_layouts')
@section('admin_content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Products</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Product <a class="btn btn-sm btn-warning float-right" href="{{ route('products.index') }}">All Products</a></h6>

                <div class="form-layout">
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('put')
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="Enter product name">
                                    @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_code') is-invalid @enderror" type="text" name="product_code" value="{{ $product->product_code }}" placeholder="Enter product code">
                                    @error('product_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_quantity') is-invalid @enderror" type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="Enter product quantity" min="1">
                                    @error('product_quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose category" name="category_id">
                                        <option label="Choose category"></option>
                                        @foreach($categories as $index => $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $product->category_id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose sub category" name="subcategory_id">
                                        <option label="Choose sub category"></option>
                                        @foreach($sub_categories as $index => $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $product->subcategory_id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose brand" name="brand_id">
                                        <option label="Choose brand"></option>
                                        @foreach($brands as $index => $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $product->brand_id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <br>
                                    <input class="form-control @error('product_size') is-invalid @enderror" type="text" name="product_size" value="{{ $product->product_size }}" data-role="tagsinput" id="size">
                                    @error('product_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                    <br>
                                    <input class="form-control @error('product_color') is-invalid @enderror" type="text" name="product_color" value="{{ $product->product_color }}" data-role="tagsinput" id="color">
                                    @error('product_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('selling_price') is-invalid @enderror" type="text" name="selling_price" value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('discount_price') is-invalid @enderror" type="text" name="discount_price" value="{{ $product->discount_price }}">
                                    @error('discount_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="product_details">{{ $product->product_details }}</textarea>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="url" name="video_link" value="{{ $product->video_link }}" placeholder="Enter video link">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image One (Main Thumbnail) <span class="tx-danger">*</span></label>
                                            <br>
                                            <label class="custom-file">
                                                <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this)">
                                                <span class="custom-file-control"></span>
                                            </label> <br> <br>
                                            <img src="" id="one">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ $product->image_one }}" alt="" width="64px">
                                    </div>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Two <span class="tx-danger">*</span></label>
                                            <br>
                                            <label class="custom-file">
                                                <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)">
                                                <span class="custom-file-control"></span>
                                            </label> <br> <br>
                                            <img src="" id="two">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ $product->image_two }}" alt="" width="64px">
                                    </div>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Three <span class="tx-danger">*</span></label>
                                            <br>
                                            <label class="custom-file">
                                                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)">
                                                <span class="custom-file-control"></span>
                                            </label> <br> <br>
                                            <img src="" id="three">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{ $product->image_three }}" alt="" width="64px">
                                    </div>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <hr>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="hidden" name="main_slider" value="0">
                                        <input type="checkbox" name="main_slider" value="1" {{ $product->main_slider ? 'checked' : '' }}>
                                        <span>Main Slider</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="hidden" name="hot_deal" value="0">
                                        <input type="checkbox" name="hot_deal" value="1" {{ $product->hot_deal ? 'checked' : '' }}>
                                        <span>Hot Deal</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="hidden" name="best_rated" value="0">
                                        <input type="checkbox" name="best_rated" value="1" {{ $product->best_rated ? 'checked' : '' }}>
                                        <span>Best Rated</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="hidden" name="trend" value="0">
                                        <input type="checkbox" name="trend" value="1" {{ $product->trend ? 'checked' : '' }}>
                                        <span>Trend Product</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="hidden" name="mid_slider" value="0">
                                        <input type="checkbox" name="mid_slider" value="1" {{ $product->mid_slider ? 'checked' : '' }}>
                                        <span>Mid Slider</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="hidden" name="hot_new" value="0">
                                        <input type="checkbox" name="hot_new" value="1" {{ $product->hot_new ? 'checked' : '' }}>
                                        <span>Hot New</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5" type="submit">Update</button>
                        </div><!-- form-layout-footer -->
                    </form>
                </div><!-- form-layout -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).ready(function () {
            $('select[name="category_id"]').change(function () {
                var category_id = $(this).val();
                if (category_id){
                    $.ajax({
                        url: '{{ url('/get/sub/category/') }}/'+category_id,
                        type: 'get',
                        dataType: 'json',
                        success:function (data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>')
                            })
                        }
                    })
                }
            })
        })
    </script>

    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
