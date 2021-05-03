@extends('layouts.admin')

@section('title', 'Edit About')

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
                <div class="card-header">Manage About page</div>

                <div class="card-body">
                
                <form action="{{ route('about.update', [$about->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="title" class="form-control" value="{{$about->title}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Image</strong>
                                <img src="/storage/image/{{$about->image}}" width="10%" alt="">
                                <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="image" id="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Text</strong>
                                <textarea name="text" class="form-control" id="" cols="30" rows="10">{{$about->text}}</textarea>
                            </div>
                        </div>
                        <script>
                            tinymce.init({
                            selector: 'textarea',
                            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            toolbar_mode: 'floating',
                            });
                        </script>
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
