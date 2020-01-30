@extends('layouts.app')
@section('content')

    {{--@php
      dd($cart);
    @endphp--}}

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>
                            <div class="cart_items">
                                <ul class="cart_list">
                                    @foreach($cart as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img
                                                src="{{ $row->options->image }}" width="133px" height="133px">
                                        </div>
                                        <div
                                            class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $row->name }}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">
                                                    {{ $row->options->color }}
                                                </div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">
                                                    {{ $row->options->size }}
                                                </div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <form action="{{ route('update.cart.item') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_rowId" value="{{ $row->rowId }}">
                                                    <input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px; height: 30px">
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></button>
                                                </form>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">${{ $row->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">${{ $row->qty * $row->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text">
                                                    <a href="{{ route('cart.remove', $row->rowId) }}" class="btn btn-sm btn-danger">X</a>
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
                            <button type="button" class="button cart_button_checkout">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
