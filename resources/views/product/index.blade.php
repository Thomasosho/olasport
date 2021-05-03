@extends('layouts.admin')

@section('title', 'My Products')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Products</div>

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delivery Fees</th>
                        <th scope="col">Sold Out?</th>
                        <th scope="col">Images</th>
                        <th scope="col">Colors</th>
                        <th scope="col">sizes</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th >{{$product->name}}</th>
                            <th >{{$product->category->name}}</th>
                            <th >{{$product->price}}</th>
                            <th >{{$product->delivery_fee}}</th>
                            <th >{{$product->sold_out}}</th>
                            <th >
                                @if($product->image != 'noimmage.jpg')
                                <img src="/storage/image/{{$product->image}}" alt="{{$product->image}}" style="width:20%">
                                @endif
                                @if($product->image1 != 'noimmage.jpg')
                                <img src="/storage/image/{{$product->image1}}" alt="{{$product->image1}}" style="width:20%">
                                @endif
                                @if($product->image2 != 'noimmage.jpg')
                                <img src="/storage/image/{{$product->image2}}" alt="{{$product->image2}}" style="width:20%">
                                @endif
                                @if($product->image3 != 'noimmage.jpg')
                                <img src="/storage/image/{{$product->image3}}" alt="{{$product->image3}}" style="width:20%">
                                @endif
                                @if($product->image4 != 'noimmage.jpg')
                                <img src="/storage/image/{{$product->image4}}" alt="{{$product->image4}}" style="width:20%">
                                @endif
                            </th>
                            <th >
                                @if($product->custom_color1 != null)
                                    {{$product->custom_color1}},
                                @endif
                                @if($product->custom_color2 != null)
                                    {{$product->custom_color2}},
                                @endif
                                @if($product->custom_color3 != null)
                                    {{$product->custom_color3}},
                                @endif
                                @if($product->custom_color4 != null)
                                    {{$product->custom_color4}},
                                @endif
                                @if($product->custom_color5 != null)
                                    {{$product->custom_color5}},
                                @endif
                                @if($product->custom_color6 != null)
                                    {{$product->custom_color6}}
                                @endif
                            </th>
                            <th >
                                @if($product->sx != null)
                                    {{$product->sx}},
                                @endif
                                @if($product->s != null)
                                    {{$product->s}},
                                @endif
                                @if($product->m != null)
                                    {{$product->m}},
                                @endif
                                @if($product->l != null)
                                    {{$product->l}},
                                @endif
                                @if($product->xl != null)
                                    {{$product->xl}},
                                @endif
                                @if($product->xxl != null)
                                    {{$product->xxl}}
                                @endif
                            </th>
                            <th >
                                <a href="{{ route('product.edit', $product->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm"> Edit </button>
                                </a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="float-left">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection