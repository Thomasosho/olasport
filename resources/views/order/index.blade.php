@extends('layouts.ola')

@section('title', 'product Order list @ Ola sport wears')

@section('content')
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">My Order list</div>
            </div>
        </div>

        <div>
            <div class="row" style="margin:30px;">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>date</th>
                        <th>product</th>
                        <th>name</th>
                        <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderuser as $key => $order)
                            @if ($key === 0)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td> <a href="/product/{{$order->product->id}}"><img src="/storage/image/{{$order->product->image}}" width="50px;" alt=""></a></td>
                                    <td><a href="/product/{{$order->product->id}}">{{$order->product->name}}</a></td>
                                    <td>{{$order->status}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection