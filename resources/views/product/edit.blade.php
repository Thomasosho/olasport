@extends('layouts.admin')

@section('title', 'Edit '. $product->name. ' on Ola Sport Wears')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage {{ $product->name }}</div>

                <div class="card-body">
                
                <form action="{{ route('product.update', [$product->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Category</strong>
                                <select name="category" class="form-control" id="">
                                    <option value="{{$cat->id}}" selected>--({{$cat->name}}) select category--</option>
                                    @foreach($category as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Price ₦</strong>
                                <input type="number" name="price" class="form-control" value="{{ $product->price}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Delivery Fee ₦</strong>
                                <input type="number" name="delivery_fee" class="form-control" value="{{ $product->delivery_fee }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Sold Out?</strong>
                                <select name="sold_out" class="form-control" id="">
                                    <option value="{{$product->sold_out}}" selected>--({{$product->sold_out}}) select--</option>
                                    <option value="sold">Sold Out</option>
                                    <option value="available">Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Upload Main Image</strong>
                                <img src="/storage/image/{{$product->image}}" width="10%" alt="">
                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Upload Image1</strong>
                                <img src="/storage/image/{{$product->image1}}" width="10%" alt="">
                                <input type="file" name="image1" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Upload Image2</strong>
                                <img src="/storage/image/{{$product->image2}}" width="10%" alt="">
                                <input type="file" name="image2" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Upload Image3</strong>
                                <img src="/storage/image/{{$product->image3}}" width="10%" alt="">
                                <input type="file" name="image3" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Upload Image4</strong>
                                <img src="/storage/image/{{$product->image4}}" width="10%" alt="">
                                <input type="file" name="image4" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color1</strong>
                                <input type="text" name="custom_color1" class="form-control" value="{{$product->custom_color1}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color2</strong>
                                <input type="text" name="custom_color2" class="form-control" value="{{$product->custom_color2}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color3</strong>
                                <input type="text" name="custom_color3" class="form-control" value="{{$product->custom_color3}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color4</strong>
                                <input type="text" name="custom_color4" class="form-control" value="{{$product->custom_color4}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color5</strong>
                                <input type="text" name="custom_color5" class="form-control" value="{{$product->custom_color5}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color6</strong>
                                <input type="text" name="custom_color6" class="form-control" value="{{$product->custom_color6}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Sizes</strong>
                                <select multiple class="form-control" name="size[]" id="exampleFormControlSelect2">
                                    <option value="small" @if($product->s) selected @endif>SM</option>
                                    <option value="medium" @if($product->m) selected @endif>M</option>
                                    <option value="large" @if($product->l) selected @endif>L</option>
                                    <option value="x-large" @if($product->xl) selected @endif>XL</option>
                                    <option value="xx-large" @if($product->xxl) selected @endif>XXL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
