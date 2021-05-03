@extends('layouts.admin')

@section('title', 'Edit Contact')

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
                <div class="card-header">Manage Contact page</div>

                <div class="card-body">
                
                <form action="{{ route('contact.update', [$contact->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Phone 1</strong>
                                <input type="number" name="phone1" class="form-control" value="{{$contact->phone1}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Phone 2</strong>
                                <input type="number" class="form-control" name="phone2" value="{{$contact->phone2}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Phone 3</strong>
                                <input type="number" class="form-control" name="phone3" value="{{$contact->phone3}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" class="form-control" name="email" value="{{$contact->email}}">
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
