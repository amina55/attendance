@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('content.add_new_teacher') }}
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ ($teacher) ? route('teacher.update', [$teacher]) : route('teacher.store') }}">
                            {{ csrf_field() }}

                            {{ ($teacher) ? method_field('PUT') : '' }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') ? old('name') : (($teacher) ? $teacher->name : '') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                                <label for="phone_no" class="col-md-4 control-label">Phone No.</label>

                                <div class="col-md-6">
                                    <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') ? old('phone_no') : (($teacher) ? $teacher->phone_no : '') }}" required>

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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : (($teacher) ? $teacher->email : '') }}" required>

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
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : (($teacher) ? $teacher->address : '') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('qualification') ? ' has-error' : '' }}">
                                <label for="qualification" class="col-md-4 control-label">Qualification</label>

                                <div class="col-md-6">
                                    <input id="qualification" type="text" class="form-control" name="qualification" value="{{ old('qualification') ? old('qualification') : (($teacher) ? $teacher->qualification : '') }}" required>

                                    @if ($errors->has('qualification'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('unique_name') ? ' has-error' : '' }}">
                                <label for="unique_name" class="col-md-4 control-label">Unique Name</label>

                                <div class="col-md-6">
                                    <input id="unique_name" type="text" class="form-control" name="unique_name" {{ ($teacher) ? 'disabled' : '' }}
                                           value="{{ old('unique_name') ? old('unique_name') : (($teacher) ? $teacher->unique_name : '') }}" required>

                                    @if ($errors->has('unique_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unique_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cnic') ? ' has-error' : '' }}">
                                <label for="cnic" class="col-md-4 control-label">CNIC</label>

                                <div class="col-md-6">
                                    <input id="cnic" type="text" class="form-control" name="cnic" {{ ($teacher) ? 'disabled' : '' }}
                                           value="{{ old('cnic') ? old('cnic') : (($teacher) ? $teacher->cnic : '') }}" required>

                                    @if ($errors->has('cnic'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cnic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> {{ ($teacher) ? 'Update' : 'Add' }} Teacher's Record </button>
                                    <a type="button" href="{{ route('teacher.index') }}" class="btn btn-default"> Cancel </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
