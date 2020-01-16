@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('admin/home') }}">{{ config('app.name') }}</a>
            <span class="breadcrumb-item active">Products</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Details
                    <a class="btn btn-sm btn-warning float-right" href="{{ route('products.index') }}">Back</a>
                    <a class="btn btn-sm btn-primary float-right mr-1" href="{{ route('products.edit', $product->id) }}">Edit</a>
                </h6>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name:</label> <br>
                                <strong>{{ $product->product_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code:</label> <br>
                                <strong>{{ $product->product_code }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity:</label> <br>
                                <strong>{{ $product->product_quantity }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category:</label> <br>
                                <strong>{{ $product->category->name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Category:</label> <br>
                                <strong>{{ $product->subCategory->name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand:</label> <br>
                                <strong>{{ $product->brand->name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size:</label> <br>
                                <strong>{{ $product->product_size }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color:</label> <br>
                                <strong>{{ $product->product_color }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price:</label> <br>
                                <strong>{{ $product->selling_price }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        @if($product->discount_price)
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount:</label> <br>
                                    <strong>{{ $product->discount_price }}</strong>
                                </div>
                            </div><!-- col-4 -->
                        @endif
                        <div class="col-lg-12">
                            <div class="form-group" style="border: 1px solid gray; padding: 10px;">
                                <label class="form-control-label">Product Details:</label>
                                <p>{!! $product->product_details !!}</p>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link:</label> <br>
                                <strong><a href="{{ $product->video_link }}" target="_blank">{{ $product->video_link }}</a></strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnail)</label>
                                <br>
                                <img src="{{ $product->image_one }}" alt="" width="64px">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Two</label>
                                <br>
                                <img src="{{ $product->image_two }}" alt="" width="64px">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Three</label>
                                <br>
                                <img src="{{ $product->image_three }}" alt="" width="64px">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                @if($product->main_slider == 1)
                                    <span class="badge badge-success">Active</span> |
                                @else
                                    <span class="badge badge-danger">Inactive</span> |
                                @endif
                                <span>Main Slider</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                @if($product->hot_deal == 1)
                                    <span class="badge badge-success">Active</span> |
                                @else
                                    <span class="badge badge-danger">Inactive</span> |
                                @endif
                                    <span>Hot Deal</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                @if($product->best_rated == 1)
                                    <span class="badge badge-success">Active</span> |
                                @else
                                    <span class="badge badge-danger">Inactive</span> |
                                @endif
                                    <span>Best Rated</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                @if($product->trend == 1)
                                    <span class="badge badge-success">Active</span> |
                                @else
                                    <span class="badge badge-danger">Inactive</span> |
                                @endif
                                    <span>Trend Product</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                @if($product->mid_slider == 1)
                                    <span class="badge badge-success">Active</span> |
                                @else
                                    <span class="badge badge-danger">Inactive</span> |
                                @endif
                                    <span>Mid Slider</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                @if($product->hot_new == 1)
                                    <span class="badge badge-success">Active</span> |
                                @else
                                    <span class="badge badge-danger">Inactive</span> |
                                @endif
                                    <span>Hot New</span>
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                </div><!-- form-layout -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->
    </div>

@endsection
