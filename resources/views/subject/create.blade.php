@extends('layouts.app')
@section('content')
    <?php $semesters = [1,2,3,4,5,6,7,8] ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('content.add_new_subject') }}
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ ($subject) ? route('subject.update', [$subject]) : route('subject.store') }}">
                            {{ csrf_field() }}

                            {{ ($subject) ? method_field('PUT') : '' }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') ? old('name') : (($subject) ? $subject->name : '') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('short_key') ? ' has-error' : '' }}">
                                <label for="short_key" class="col-md-4 control-label">Short Name</label>

                                <div class="col-md-6">
                                    <input id="short_key" type="text" class="form-control" name="short_key" value="{{ old('short_key') ? old('short_key') : (($subject) ? $subject->short_key : '') }}" required>

                                    @if ($errors->has('short_key'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('short_key') }}</strong>
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

                            <h3  class="centre-align-heading">Section A Detail </h3>

                            <div class="form-group{{ $errors->has('teacher_section_A') ? ' has-error' : '' }}">
                                <label for="teacher_section_A" class="col-md-4 control-label">Assign Teacher</label>

                                <div class="col-md-6">
                                    <?php $teacherA = old('teacher_section_A') ? old('teacher_section_A') : (($subject) ? $subject->teacher_section_A : '');  ?>
                                    <select id="semester" class="form-control" name="semester" {{ ($subject) ? 'disabled' : '' }} required>
                                        <option value=""> -- Select A Teacher -- </option>
                                    @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('teacher_section_A'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('teacher_section_A') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('period_section_A') ? ' has-error' : '' }}">
                                <label for="period_section_A" class="col-md-4 control-label">Assign Period No.</label>

                                <div class="col-md-6">
                                    <?php $periodId =  old('period_section_A') ? old('period_section_A') : (($subject) ? $subject->period_section_A : ''); ?>
                                    <select id="period_section_A" class="form-control" name="period_section_A" required>
                                        <option value=""> -- Select A Period -- </option>
                                    @foreach($semesters as $semester)
                                            <option value="{{ $semester }}"> Period {{ $semester }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('period_section_A'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('period_section_A') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <h3  class="centre-align-heading">Section B Detail </h3>

                            <div class="form-group{{ $errors->has('teacher_section_B') ? ' has-error' : '' }}">
                                <label for="teacher_section_B" class="col-md-4 control-label">Assign Teacher</label>

                                <div class="col-md-6">
                                    <?php $teacherA = old('teacher_section_B') ? old('teacher_section_B') : (($subject) ? $subject->teacher_section_B : '');  ?>
                                    <select id="semester" class="form-control" name="semester" {{ ($subject) ? 'disabled' : '' }} required>
                                        <option value=""> -- Select A Teacher -- </option>
                                    @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('teacher_section_B'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('teacher_section_B') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('period_section_B') ? ' has-error' : '' }}">
                                <label for="period_section_B" class="col-md-4 control-label">Assign Period No.</label>

                                <div class="col-md-6">
                                    <?php $periodId =  old('period_section_B') ? old('period_section_B') : (($subject) ? $subject->period_section_B : ''); ?>
                                    <select id="period_section_B" class="form-control" name="period_section_B" required>
                                        <option value=""> -- Select A Period -- </option>
                                    @foreach($semesters as $semester)
                                            <option value="{{ $semester }}"> Period {{ $semester }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('period_section_B'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('period_section_B') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> {{ ($subject) ? 'Update' : 'Add' }} Subject </button>
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
