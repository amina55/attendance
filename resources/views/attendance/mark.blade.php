@extends('layouts.app')

@section('content')

    <?php $currentDate = date('d'); $sm ?>
    <div class="container">
        <div class="row">
            @if($students->isEmpty())
                <div class="col-md-12"> There is no Student</div>

            @else
                <form action="{{ route('attendance.save', [$students[0]->semester, $students[0]->section, $subject]) }}" method="post">
                    {{ csrf_field() }}

                    <h4> Mark Attendance of Semester {{ $students[0]->semester }} ({{ $students[0]->section }})</h4>
                    <p><strong>P</strong> : Present, <strong>A</strong>  : Absent, <strong>L</strong> : Leave, <strong>S</strong> : Sick</p>

                    <br>
                    <table class="table">
                        <thead>
                        <th>Roll No</th>
                        <th>Name</th>

                        @for($i=0; $i<$currentDate ; $i++)

                            <?php $strDate = strtotime('-'.$i.' day');
                            $day = date('D', $strDate); ?>

                            @if($day != 'Sat' && $day != 'Sun')
                                <th>{{ date('D, d-m-y', $strDate) }}</th>
                            @endif

                        @endfor

                        </thead>
                        @foreach($students as $student)
                            <tr>
                                <td> {{ $student->roll_no }} </td>
                                <td> {{ $student->name }} </td>

                                @for($i=0; $i<$currentDate ; $i++)

                                    <?php $strDate = strtotime('-'.$i.' day');
                                    $day = date('D', $strDate);
                                    $date = date('Y-m-d', $strDate);
                                    $id = 'std_'.$student->id.'_date_'.$date;

                                    $studentAttendance = $attendance->where('student_id', $student->id)->where('date' , $date.' 00:00:00')->pluck('attendance');
                                    $att = (!$studentAttendance->isEmpty()) ? $studentAttendance[0] : '';
                                    ?>

                                    @if($day != 'Sat' && $day != 'Sun')
                                        <td> <input class="attendance-text" type="text" name="{{ $id }}" value="{{ $att }}"> </td>
                                    @endif

                                @endfor
                            </tr>
                        @endforeach
                    </table>
                    <div class="col-md-12">
                        <input class="btn btn-primary" type="submit" value="Mark Attendance">
                        <a class="btn btn-default" href="{{ route('home.teacher') }}">Cancel</a>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
