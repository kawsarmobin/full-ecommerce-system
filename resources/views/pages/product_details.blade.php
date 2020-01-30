@extends('layouts.app')
@section('content')

    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="{{ $product->image_one }}"><img src="{{ $product->image_one }}" alt=""></li>
                        <li data-image="{{ $product->image_two }}"><img src="{{ $product->image_two }}" alt=""></li>
                        <li data-image="{{ $product->image_three }}"><img src="{{ $product->image_three }}" alt=""></li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ $product->image_one }}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{ $product->category->name }} > {{ $product->subCategory->name }}</div>
                        <div class="product_name">{{ $product->product_name }}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text text-justify"><p>{!! Str::limit($product->product_details, 300) !!}</p></div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{ route('cart.product.add', $product->id) }}" method="post">
                                @csrf
                                <div class="clearfix" style="z-index: 1000;">

                                    <div class="form-row">
                                        <!-- Product Color -->
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Quantity</label>
                                            <input type="number" class="form-control" id="inputCity" pattern="[0-9]*" value="1" name="qty">
                                        </div>
                                        <!-- Product Quantity -->
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Color</label>
                                            <select id="inputState" class="form-control" name="color">
                                                @foreach($product_color as $color)
                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Product Size -->
                                        @if($product->product_size)
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Size</label>
                                                <select id="inputState" class="form-control" name="size">
                                                    @foreach($product_size as $size)
                                                        <option value="{{ $size }}">{{ $size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div class="product_price">
                                    @if($product->discount_price)
                                        ${{ $product->discount_price }}<span>${{ $product->selling_price }}</span>
                                    @else
                                        ${{ $product->selling_price }}
                                    @endif
                                </div>
                                <div class="button_container">
                                    <button type="submit" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Product Details</div>
                            <ul class="clearfix">
                                <li class="active">Product Details</li>
                                <li>Video or Links</li>
                                <li>Product Review</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <div class="bestsellers_panel panel active bestsellers_item">
                            {!! $product->product_details !!}
                        </div>

                        <div class="bestsellers_panel panel bestsellers_item">
                            <a href="{{ $product->video_link }}" target="_blank">{{ $product->video_link }}</a>
                        </div>

                        <div class="bestsellers_panel panel bestsellers_item">
                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=561227764712417&autoLogAppEvents=1"></script>
@endsection
