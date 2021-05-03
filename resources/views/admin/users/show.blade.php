@extends('layouts.admin')

@section('title', 'Selected User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ Auth::user()->name }}</h3></div>

                <div class="card-body">
                    
                    <img src="/storage/cover_images/{{Auth::user()->avatar}}" style="width:180px; float:left; border-radius:50%; margin-right:25px;"/><br>
                    <p><b>Name:</b>{{ucwords(Auth::user()->name)}}</p>
                    <p><b>Date of Birth:</b> {{ Auth::user()->dob }}</p>
                    <p><b>Phone:</b>{{ Auth::user()->phone }}</p>
                    <p><b>Address:</b>{{ Auth::user()->address }}</p>
                    <p><b>Email Address:</b>{{ Auth::user()->email }}</p>

                    
                    <!--<form action="{{ route('admin.users.update', ['users' => Auth::user()->id]) }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="col">
                        {{Form::label('email', 'Email Address')}}
                        {{Form::text('email', Auth::user()->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                    </div>

                    <div class="col">
                        {{Form::label('address', 'Address')}}
                        {{Form::text('address', Auth::user()->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
                    </div>

                    <div class="col">
                        {{Form::label('password', 'Password')}}
                        {{Form::text('password', Auth::user()->password, ['class' => 'form-control', 'placeholder' => 'password'])}}
                    </div>
                    
                    <div class="col-sm-3 my-1">
                    <br>
                    <div class="row">
                    
                   </div>
                        {{Form::file('avatar')}}
                        <br><br>
                    </div>
                    <div class="col">
                        <span><b>Select Role</b></span>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>-->

                    
                    <!-- <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label><b>Update Profile Image</b></label><br>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <input type="submit" class="pull-right btn btn-sm btn-primary" value="Update Avatar">
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
