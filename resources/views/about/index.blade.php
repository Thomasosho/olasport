@extends('layouts.ola')

@section('title', 'Contact us @ Ola sport wears')

@section('content')
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">{{$about->title}}</div>
            </div>
        </div>

        <div class="row products_row">

           
                <div class="col-xl-4 col-md-6">
                    <img src="/storage/image/{{$about->image}}" alt="">
                </div>

                <div class="col-xl-8 col-md-6">
                    {!!$about->text!!}
                </div>
            
        </div>
    </div>
@endsection