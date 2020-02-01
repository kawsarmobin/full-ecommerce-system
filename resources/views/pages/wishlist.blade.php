@extends('layouts.app')
@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Your wishlist</div>
                            <div class="cart_items">
                                <ul class="cart_list">
                                    @foreach($wishlist as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img
                                                src="{{ $row->product->image_one }}" width="133px" height="133px">
                                        </div>
                                        <div
                                            class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $row->product->product_name }}</div>
                                            </div>
                                            @if($row->product->product_color)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">
                                                        {{ $row->product->product_color }}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($row->product->product_size)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">
                                                        {{ $row->product->product_size }}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">${{ $row->product->selling_price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text">
                                                    <a href="#" class="btn btn-sm btn-danger">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                    <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">${{ Cart::subtotal() }}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_clear">Cancel</button>
                            <a href="{{ route('user.checkout') }}" class="button cart_button_checkout text-white">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
