@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage {{ $user->name }}</div>

                <div class="card-body">
                
                <form action="{{ route('admin.users.update', [$user->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="col">
                        <span><b>Select Role</b></span>
                    </div>
                    @foreach($roles as $role)
                    <div class="form-check">
                        <input type="radio" name="roles[]" value="{{ $role->id }}"
                            {{ $user->hasAnyRole($role->name)?'checked':''}}>
                        <label> {{ $role->name }} </label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
