@extends('layouts.ola')

@section('title', 'search result @ OLA!')

@section('content')
</div>

<div class="products">
    <div class="container">
        <div class="row">
            @if(isset($details))
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">
                    <h2>Showing Results for {{ $query }}</h2>
                    </div>
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
        @elseif($warning = 1)
            <h2>Sorry, No Results found</h2>
        @endif
        </div>
    </div>

@endsection