@extends('layouts.ola')

@section('title', 'Contact us @ Ola sport wears')

@section('content')
</div>

<div class="home">
  <div class="home_container d-flex flex-column align-items-center justify-content-end">
    <div class="home_content text-center">
      <div class="home_title">Contact</div>
        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
          <ul class="d-flex flex-row align-items-start justify-content-start text-center">
            <li><a href="/">Home</a></li>
            <li><a href="/prodctcategory/{{$categ->id}}">{{$categ->name}}</a></li>
          </ul>
      </div>
    </div>
  </div>
</div>

<div class="product">
  <div class="container">
    <div class="row">
      
        <div class="col-lg-6">
          <div class="product_image_slider_container">
            <div id="slider" class="flexslider">
              <ul class="slides">
                @if($product->image != 'noimmage.jpg')
                  <li>
                    <img src="/storage/image/{{$product->image}}" alt="">
                  </li>
                @endif
                @if($product->image1 != 'noimmage.jpg')
                  <li>
                    <img src="/storage/image/{{$product->image1}}" alt="">
                  </li>
                @endif
                @if($product->image2 != 'noimmage.jpg')
                  <li>
                    <img src="/storage/image/{{$product->image2}}" alt="">
                  </li>
                @endif
                @if($product->image3 != 'noimmage.jpg')
                  <li>
                    <img src="/storage/image/{{$product->image3}}" alt="">
                  </li>
                @endif
                @if($product->image4 != 'noimmage.jpg')
                  <li>
                    <img src="/storage/image/{{$product->image4}}" alt="">
                  </li>
                @endif
              </ul>
            </div>
          <div class="carousel_container">
        <div id="carousel" class="flexslider">
        <ul class="slides">
          @if($product->image != 'noimmage.jpg')
            <li>
              <div><img src="/storage/image/{{$product->image}}" /></div>
            </li>
          @endif
          @if($product->image1 != 'noimmage.jpg')
            <li>
              <div><img src="/storage/image/{{$product->image1}}" /></div>
            </li>
          @endif
          @if($product->image2 != 'noimmage.jpg')
          <li>
            <div><img src="/storage/image/{{$product->image2}}" /></div>
          </li>
          @endif
          @if($product->image3 != 'noimmage.jpg')
            <li>
              <div><img src="/storage/image/{{$product->image3}}" /></div>
            </li>
          @endif
          @if($product->image4 != 'noimmage.jpg')
            <li>
              <div><img src="/storage/image/{{$product->image4}}" /></div>
            </li>
          @endif
        </ul>
      </div>
    <div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
    <div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
  </div>
</div>
</div>
<form action="{{route('addToCart')}}" method="post" role="form">
{{ csrf_field() }}
  <input type="hidden" name="product_id" value="{{$product->id}}">
  <input type="hidden" name="user_id" value="{{Auth::user()->id ?? ''}}">
  <input type="hidden" name="quantity" value="1">

<div class="col-lg-6 product_col" style="max-width: 100% !important;">
  <div class="product_info">
    <div class="product_name">{{$product->name}}</div>
    <div class="product_category">In <a href="/prodctcategory/{{$categ->id}}">{{$categ->name}}</a></div>
    <div class="product_price">₦{{ number_format($product->price) }}</div>
      @if($product->s || $product->m || $product->l || $product->xl || $product->xxl)
        <div class="product_size">
          <div class="product_size_title">Select Size</div>
          <ul class="d-flex flex-row align-items-start justify-content-start">
          @if($product->s)
            <li>
              <input type="radio" id="radio_2" value="small" name="product_radio" class="regular_radio radio_2">
              <label for="radio_2">S</label>
            </li>
          @endif
          @if($product->m)
          <li>
            <input type="radio" id="radio_3" value="medium" name="product_radio" class="regular_radio radio_3">
            <label for="radio_3">M</label>
          </li>
          @endif
          @if($product->l)
          <li>
            <input type="radio" id="radio_4" value="large" name="product_radio" class="regular_radio radio_4">
            <label for="radio_4">L</label>
          </li>
          @endif
          @if($product->xl)
          <li>
            <input type="radio" id="radio_5" value="x-large" name="product_radio" class="regular_radio radio_5">
            <label for="radio_5">XL</label>
          </li>
          @endif
          @if($product->xxl)
          <li>
            <input type="radio" id="radio_6" value="xx-large" name="product_radio" class="regular_radio radio_6">
            <label for="radio_6">XXL</label>
          </li>
          @endif
        </div>
      @endif
  <div class="product_size">
      <div class="product_size_title">Select Colour</div>
      <select name="color" class="form-control">
        <option value="">--select colour--</option>
        @if($product->custom_color1)
          <option value="{{$product->custom_color1}}">{{$product->custom_color1}}</option>
        @endif
        @if($product->custom_color2)
          <option value="{{$product->custom_color2}}">{{$product->custom_color2}}</option>
        @endif
        @if($product->custom_color3)
          <option value="{{$product->custom_color3}}">{{$product->custom_color3}}</option>
        @endif
        @if($product->custom_color4)
          <option value="{{$product->custom_color4}}">{{$product->custom_color4}}</option>
        @endif
        @if($product->custom_color5)
          <option value="{{$product->custom_color5}}">{{$product->custom_color5}}</option>
        @endif
        @if($product->custom_color6)
          <option value="{{$product->custom_color6}}">{{$product->custom_color6}}</option>
        @endif
      </select>
  </div>
  <div class="product_buttons">
    <button type="submit" id="buttonAddToCart" class="form-control">
      <i class="fa fa-cart-plus"></i> Add to Cart
    </button>
  </div>
</div>

</form>
</div>
</div>
</div>
</div>

@endsection
