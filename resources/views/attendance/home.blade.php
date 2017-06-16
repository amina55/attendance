@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <th>Class</th>
                    <th>Subject Name</th>
                    <th>Subject Key</th>
                    <th>Period</th>
                    <th>Attendance</th>
                </thead>
                @foreach($subjects as $subject)
                    <tr>
                        <td> Semester {{ $subject->subject->semester }} ( {{ $subject->section }}) </td>
                        <td> {{ $subject->subject->name }} </td>
                        <td> {{ $subject->subject->short_key }} </td>
                        <td> {{ $subject->period }} </td>

                        <td>
                            <a title="Mark Attendance" href="{{ route('attendance.mark', [$subject->subject->semester, $subject->section, $subject->subject->id]) }}">Mark Attendance</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
