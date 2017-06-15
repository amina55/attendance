@extends('layouts.app')
@section('content')
    <?php $semesters = [1,2,3,4,5,6,7,8] ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('content.add_new_student') }}
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ ($student) ? route('student.update', [$student]) : route('student.store') }}">
                            {{ csrf_field() }}

                            {{ ($student) ? method_field('PUT') : '' }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') ? old('name') : (($student) ? $student->name : '') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                                <label for="semester" class="col-md-4 control-label">Semester</label>

                                <div class="col-md-6">
                                    <select id="semester" class="form-control" name="semester" required>
                                        <option value=""> -- Select A Semester -- </option>
                                    @foreach($semesters as $semester)
                                            <option value="{{ $semester }}"> Semester {{ $semester }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('semester'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                                <label for="section" class="col-md-4 control-label">Section</label>

                                <div class="col-md-6">
                                    <select id="section" class="form-control" name="section" required>
                                        <option value=""> -- Select A Section -- </option>
                                        <option value="A"> Section A</option>
                                        <option value="B"> Section B</option>
                                    </select>

                                    @if ($errors->has('section'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('enroll_no') ? ' has-error' : '' }}">
                                <label for="enroll_no" class="col-md-4 control-label">Enroll No.</label>

                                <div class="col-md-6">
                                    <input id="enroll_no" type="text" class="form-control" name="enroll_no" {{ ($student) ? 'disabled' : '' }}
                                    value="{{ old('enroll_no') ? old('enroll_no') : (($student) ? $student->enroll_no : '') }}" required>

                                    @if ($errors->has('enroll_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('enroll_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                                <label for="phone_no" class="col-md-4 control-label">Phone No.</label>

                                <div class="col-md-6">
                                    <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') ? old('phone_no') : (($student) ? $student->phone_no : '') }}" required>

                                    @if ($errors->has('phone_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : (($student) ? $student->email : '') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : (($student) ? $student->address : '') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> {{ ($student) ? 'Update' : 'Add' }} student's Record </button>
                                    <a type="button" href="{{ route('home') }}" class="btn btn-default"> Cancel </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
