@extends('layouts.admin')

@section('title', 'New Maintenance log')

@section('content')
<div class="col-sm-12">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
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
    <div class="card card-body">
        <h4 class="card-title">Add Maintenance</h4>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form class="input-form" action="{{ route('maintenance.store') }}" method="POST" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                    <label class="control-label mt-3" for="example-input1-group2">Enter details</label>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend datepicker">
                                    <label class="btn btn-danger" type="button">Machine</label>
                                </div>
                                <select name="machine_id" class="form-control">
                                    @foreach($machine as $machine)
                                        <option value="{{$machine->id}}">{{$machine->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend datepicker">
                                    <label class="btn btn-danger" type="button">Maintenance</label>
                                </div>
                                <input type="text" class="form-control" name="maintenance">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend datepicker">
                                    <label class="btn btn-danger" type="button">Servicing company</label>
                                </div>
                                <input type="text" class="form-control" name="servicing_company">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend datepicker">
                                    <label class="btn btn-danger" type="button">Date</label>
                                </div>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend datepicker">
                                    <label class="btn btn-danger" type="button">Next maintenance</label>
                                </div>
                                <input type="date" class="form-control" name="next_date_for_maintenance">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- form-group -->
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection