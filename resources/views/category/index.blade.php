@extends('layouts.admin')

@section('title', 'My Categories')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Categories</div>

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{$category->name}}</th>
                            <th >
                                <a href="{{ route('category.edit', $category->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm"> Edit </button>
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="float-left">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection