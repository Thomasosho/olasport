@extends('layouts.ola')

@section('title', 'Return Policy @ Ola sport wears')

@section('content')
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">{{$policy->title}}</div>
            </div>
        </div>

        <div>
            <div class="row" style="margin:30px;">
                <div class="col-md-12">
                    <p>{!!$policy->title!!}</p>
                </div>
            </div>
        </div>
    </div>

@endsection