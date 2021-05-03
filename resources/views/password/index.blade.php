@extends('layouts.admin')

@section('title', 'Change Password')

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
                <div class="card-header">Change Password</div>

                <div class="card-body">
                
                <form action="{{ route('change.password') }}" method="POST" enctype = "multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Current Password</strong>
                                <input type="password" class="form-control" name="current_password" title="Current Password" id="current_password" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>New Password</strong>
                                <input type="password" name="new_password" class="form-control" title="New Password" id="new_password" required/>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()>
                                <label class="form-check-label" for="exampleCheck1">Show Password</label>
                                <script>
                                    function myFunction() {
                                        var x = document.getElementById("new_password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Confirm New Password</strong>
                                <input type="password" name="new_confirm_password" class="form-control" title="Confirm Password" id="new_confirm_password" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <button class="btn btn-primary" id="update_password" type="submit">Update Password</button>
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