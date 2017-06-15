@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Detail</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <label for="name" class="left-label col-md-8 control-label">{{ $student->name }}</label>
                            </div>

                            <div class="form-group">
                                <label for="semester" class="col-md-4 control-label">Semester</label>
                                <label for="semester" class="left-label col-md-8 control-label">Semester {{ $student->semester }}</label>
                            </div>

                            <div class="form-group">
                                <label for="section" class="col-md-4 control-label">Section</label>
                                <label for="section" class="left-label col-md-8 control-label">{{ $student->section }}</label>
                            </div>

                            <div class="form-group">
                                <label for="roll_no" class="col-md-4 control-label">Roll No.</label>
                                <label for="roll_no" class="left-label col-md-8 control-label">{{ $student->roll_no }}</label>
                            </div>

                            <div class="form-group">
                                <label for="enroll_no" class="col-md-4 control-label">Enroll No.</label>
                                <label for="enroll_no" class="left-label col-md-8 control-label">{{ $student->enroll_no }}</label>
                            </div>

                            <div class="form-group">
                                <label for="phone_no" class="col-md-4 control-label">Phone No.</label>
                                <label for="phone_no" class="left-label col-md-8 control-label">{{ $student->phone_no }}</label>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <label for="email" class="left-label col-md-8 control-label">{{ $student->email }}</label>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <label for="address" class="left-label col-md-8 control-label">{{ $student->address }}</label>
                            </div>

                            <div class="form-group col-md-4 pull-right">
                                <a href="{{ route('student.list', [$student->semester, $student->section]) }}" class="btn btn-primary">Back</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
