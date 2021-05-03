@extends('layouts.ola')

@section('title', 'Terms and Conditions @ Ola sport wears')

@section('content')
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">{{$term->title}}</div>
            </div>
        </div>

        <div>
            <div class="row" style="margin:30px;">
                <div class="col-md-12">
                    <p>{!!$term->title!!}</p>
                </div>
            </div>
        </div>
    </div>

@endsection