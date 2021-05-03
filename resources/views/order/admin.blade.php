@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Orders</div>

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Product</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Colour</th>
                        <th scope="col">Size</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $order)
                        <tr>
                            <th >{{$order->user->name}}</th>
                            <th ><img src="/storage/image/{{$order->product->image}}" alt="{{$order->product->image}}" style="width:20%"></th>
                            <th >{{$order->product->name}}</th>
                            <th >{{$order->address}}</th>
                            <th >{{$order->phone}}</th>
                            <th >{{$order->color}}</th>
                            <th >{{$order->size}}</th>
                            <th >
                                @if($order->status != 'completed')
                                    <form action="{{ route('orders.update', [$order->id]) }}" method="POST" class="float-left">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <input type="text" name="status" hidden>
                                        <button type="submit" class="btn btn-primary btn-sm">Delivered</button>
                                    </form>
                                @endif
                                @if($order->status == 'completed')
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="float-left">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection