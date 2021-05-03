@extends('layouts.admin')

@section('title', 'Edit '. $category->name. ' on Ola Sport Wears')

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
                <div class="card-header">Manage {{ $category->name }}</div>

                <div class="card-body">
                
                <form action="{{ route('category.update', [$category->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Description</strong>
                                <input type="text" name="text" class="form-control" value="{{$category->text}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">update</button>
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
