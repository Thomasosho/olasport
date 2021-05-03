@extends('layouts.cart')

@section('title', 'Cart')
@section('content')


<div class="home_container d-flex flex-column align-items-center justify-content-end">
    <div class="home_content text-center">
        <div class="home_title">Shopping Cart</div>
        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                <li><a href="/">Home</a></li>
                <li>Your Cart</li>
            </ul>
        </div>
    </div>
</div>
</div>

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart_container">

                    <div class="cart_bar">
                        <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                            <li class="mr-auto">Product</li>
                            <li>Color</li>
                            <li>Size</li>
                            <li>Price</li>
                            <li>Quantity</li>
                            <li>Total</li>
                        </ul>
                    </div>

                    <div class="cart_items">
                        <ul class="cart_items_list">
                            @foreach($cart_datas as $key => $cart_data)
                                @if ($key === 0)
                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                        <div><div class="product_number">{{$key+1}}</div></div>
                                        <div><div class="product_image"><img src="/storage/image/{{$product->image}}" alt=""></div></div>
                                        <div class="product_name_container">
                                            <div class="product_name"><a href="/product/{{$product->id}}">{{$product->name}}</a></div>
                                            <div class="product_text"><a href="/category/{{$cate->id}}" style="text-decoration:none; color: coral;">{{$cate->name}}</a></div>
                                        </div>
                                    </div>
                                    <div class="product_color product_text"><span>Color: </span>{{$cart_data->color}}</div>
                                    <div class="product_size product_text"><span>Size: </span>{{$cart_data->size}}</div>
                                    <div class="product_price product_text"><span>Price: </span>₦{{ number_format($cart_data->price) }}</div>
                                    <div class="product_quantity_container">
                                        <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                            <span class="product_text product_num">{{$cart_data->quantity}}</span>
                                            <div class="qty_sub qty_button trans_200 text-center"><span><a style="text-decoration:none; color: coral;" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}"> -</a></span></div>
                                            <div class="qty_add qty_button trans_200 text-center"><span><a style="text-decoration:none; color: coral;" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> +</a></span></div>
                                        </div>
                                    </div>
                                    <div class="product_total product_text"><span>Total: </span>₦{{ number_format($cart_data->price*$cart_data->quantity) }}</div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                        <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                            <div class="button button_clear trans_200"><a href="{{url('/cart/deleteItem',$cart_data->id ?? '')}}">clear cart</a></div>
                            <div class="button button_continue trans_200"><a href="/">continue shopping</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cart_extra_row">
            <div class="col-lg-6">
                <div class="cart_extra cart_extra_1">
                    <div class="cart_extra_content cart_extra_coupon">
                        <div class="cart_extra_title">Delivery Details</div>
                            <div class="coupon_form_container">
                                <form action="{{url('/submit-order')}}" method="post" id="paymentForm" class="coupon_form">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="address">Your Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <label for="phone">Your Contact Phone Number</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Tel. Number" required>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 cart_extra_col">
                    <div class="cart_extra cart_extra_2">
                        <div class="cart_extra_content cart_extra_total">
                            <div class="cart_extra_title">Cart Total</div>
                                <ul class="cart_extra_total_list">

                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Total</div>
                                        <div class="cart_extra_total_value ml-auto">₦{{ number_format($total_price) }}</div>
                                    </li>
                                </ul>
                                <button class="checkout_button trans_200" style="color:#fff;"  onclick="clicked(event)" type="submit" onclick="payWithPaystack()">
                                    <i class="fa fa-credit-card"></i> Pay with a Card
                                </button>

                                <input type="hidden" value="{{$total_price}}" id="amount" />
                                <input type="hidden" value="{{auth()->user()->email}}" id="email-address" />
                                <input type="hidden" value="{{auth()->user()->name}}" id="first-name" />
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <script>
                                    const paymentForm = document.getElementById('paymentForm');
                                    paymentForm.addEventListener("submit", payWithPaystack, false);
                                    function payWithPaystack(e) {
                                    e.preventDefault();
                                    let handler = PaystackPop.setup({
                                        key: 'pk_test_0cbd2786d23c3afc9ca8185be201e1161378d47d', // Replace with your public key
                                        email: document.getElementById("email-address").value,
                                        amount: document.getElementById("amount").value * 100,
                                        name: document.getElementById("first-name").value,
                                        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                        // label: "Optional string that replaces customer email"
                                        onClose: function(){
                                        alert('Window closed.');
                                        },
                                        callback: function(response){
                                        let message = 'Payment complete! Reference: ' + response.reference;
                                        document.getElementById('paymentForm').submit();
                                        }
                                    });
                                    handler.openIframe();
                                    }
                                </script>
                            </form>
                        </div>
                        <script>
                            function clicked(e)
                            {
                                if(!confirm('Are you sure?')) {
                                    e.preventDefault();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection