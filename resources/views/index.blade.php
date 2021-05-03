@extends('layouts.ola')

@section('title', 'Welcome to Ola sport wears')

@section('content')
    <div class="home_slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/storage/image/{{$singleslider->image}}">
                </div>
                @foreach($slider as $key => $slider)
                    @if($key > 0)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/storage/image/{{$slider->image}}">
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center" style="font-family: 'Brush Script MT', cursive;">Styled Uniquely for you</div>
            </div>
        </div>

        <div class="row products_row">

            @foreach($product as $product)
                <div class="col-xl-4 col-md-6">
                    <div class="product">
                        <div class="product_image"><img src="/storage/image/{{$product->image}}" alt=""></div>
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name"><a href="/product/{{$product->id}}">{{$product->name}}</a></div>
                                        <div class="product_category">In <a href="/category/{{$product->category->id}}">{{$product->category->name}}</a></div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="product_price text-right">₦{{ number_format($product->price) }}</div>
                                </div>
                            </div>
                            <div class="product_buttons" onclick="window.location.href='/product/{{$product->id}}'">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                        <div><div><img src="{{asset('images/cart.svg')}}" class="svg" alt=""><div>+</div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection