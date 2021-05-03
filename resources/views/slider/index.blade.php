@extends('layouts.admin')

@section('title', 'My Slides')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Slides</div>

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($slider as $slider)
                        <tr>
                            <th ><img src="/storage/image/{{$slider->image}}" alt="{{$slider->image}}" style="width:20%"></th>
                            <th >
                                <a href="{{ route('slider.edit', $slider->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm"> Edit </button>
                                </a>
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