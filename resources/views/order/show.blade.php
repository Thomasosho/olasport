@extends('layouts.ola')

@section('title', 'Contact us @ Ola sport wears')

@section('content')
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Contact Us</div>
            </div>
        </div>

        <div>
            <div class="row" style="margin:30px;">
                <div class="col-md-6">
                    <h3>Phone:</h3>
                    <ul>
                        @if($contact->phone1)
                            <li><i class="fas fa-phone"></i> {{$contact->phone1}},</li>
                        @endif
                        @if($contact->phone1)
                            <li><i class="fas fa-phone"></i> {{$contact->phone2}},</li>
                        @endif
                        @if($contact->phone1)
                            <li><i class="fas fa-phone"></i> {{$contact->phone3}}</li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Email:</h3>
                    <ul>
                        <li><i class="fas fa-envelope-open"></i> {{$contact->email}}</li>
                    </ul>
                </div>
            </div>

            <form action="/sendmail" method="POST" enctype = "multipart/form-data" style="margin:30px;">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="first_name" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="last_name" class="form-control" placeholder="Last name" required>
                    </div>
                    <div class="col-md-6" style="margin-top:30px;">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-6" style="margin-top:30px;">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="col-md-12" style="margin-top:30px;">
                        <textarea name="text" class="form-control" id="" cols="30" rows="10" required>Enter Enquiry here!</textarea>
                    </div>
                    <div class="col-md-12" style="margin-top:30px;">
                        <button type="submit" class="form-control">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection