@extends('layouts.admin')

@section('title', 'New Product')

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
                <div class="card-header">New Product</div>

                <div class="card-body">
                
                <form action="{{ route('product.store') }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Category</strong>
                                <select name="category" class="form-control" id="">
                                    <option value="" selected disabled>--select category--</option>
                                    @foreach($category as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Price</strong>
                                <input type="number" name="price" class="form-control" placeholder="NGN 0.00">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Delivery Fee</strong>
                                <input type="number" name="delivery_fee" class="form-control" placeholder="NGN 0.00">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Sold Out?</strong>
                                <select name="sold_out" class="form-control" id="">
                                    <option value="" disabled selected>--select--</option>
                                    <option value="sold">Sold Out</option>
                                    <option value="available">Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Upload Main Image</strong>
                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="main image">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Upload Image1</strong>
                                <input type="file" name="image1" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Upload Image2</strong>
                                <input type="file" name="image2" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Upload Image3</strong>
                                <input type="file" name="image3" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Upload Image4</strong>
                                <input type="file" name="image4" accept="image/x-png,image/gif,image/jpeg" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color1</strong>
                                <input type="text" name="custom_color1" class="form-control" placeholder="red">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color2</strong>
                                <input type="text" name="custom_color2" class="form-control" placeholder="blue">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color3</strong>
                                <input type="text" name="custom_color3" class="form-control" placeholder="green">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color4</strong>
                                <input type="text" name="custom_color4" class="form-control" placeholder="indigo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color5</strong>
                                <input type="text" name="custom_color5" class="form-control" placeholder="pink">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Color6</strong>
                                <input type="text" name="custom_color6" class="form-control" placeholder="black">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Sizes</strong>
                                <select multiple class="form-control" name="size[]" id="exampleFormControlSelect2">
                                    <option value="small">SM</option>
                                    <option value="medium">M</option>
                                    <option value="large">L</option>
                                    <option value="x-large">XL</option>
                                    <option value="xx-large">XXL</option>
                                    <option value="xxx-large">XXXL</option>
                                    <option value="xxxx-large">XXXXL</option>
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
