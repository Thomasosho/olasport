@extends('layouts.admin')

@section('title', 'Edit Socials')

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
                <div class="card-header">Manage Social links</div>

                <div class="card-body">
                
                <form action="{{ route('socials.update', [$social->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Facebook</strong>
                                <input type="text" name="facebook" class="form-control" value="{{$social->facebook}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Instagram</strong>
                                <input type="text" class="form-control" name="instagram" value="{{$social->instagram}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Twitter</strong>
                                <input type="text" class="form-control" name="twitter" value="{{$social->twitter}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Youtube</strong>
                                <input type="text" class="form-control" name="youtube" value="{{$social->youtube}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Linkedin</strong>
                                <input type="text" class="form-control" name="linkedin" value="{{$social->linkedin}}">
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
