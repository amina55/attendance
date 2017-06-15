@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Teacher Detail</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <label for="name" class="left-label col-md-8 control-label">{{ $teacher->name }}</label>
                            </div>

                            <div class="form-group">
                                <label for="phone_no" class="col-md-4 control-label">Phone No.</label>
                                <label for="phone_no" class="left-label col-md-8 control-label">{{ $teacher->phone_no }}</label>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <label for="email" class="left-label col-md-8 control-label">{{ $teacher->email }}</label>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <label for="address" class="left-label col-md-8 control-label">{{ $teacher->address }}</label>
                            </div>

                            <div class="form-group">
                                <label for="qualification" class="col-md-4 control-label">Qualification</label>
                                <label for="qualification" class="left-label col-md-8 control-label">qualification {{ $teacher->qualification }}</label>
                            </div>

                            <div class="form-group">
                                <label for="cnic" class="col-md-4 control-label">CNIC</label>
                                <label for="cnic" class="left-label col-md-8 control-label">{{ $teacher->cnic }}</label>
                            </div>

                            <div class="form-group">
                                <label for="unique_name" class="col-md-4 control-label">Unique Name</label>
                                <label for="unique_name" class="left-label col-md-8 control-label">{{ $teacher->unique_name }}</label>
                            </div>


                            <div class="form-group col-md-4 pull-right">
                                <a href="{{ route('teacher.index') }}" class="btn btn-primary">Back</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
