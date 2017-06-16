<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function markAttendance($semester, $section, $subjectId)
    {
        $students = Student::where(['semester' => $semester, 'section' => $section])->get();
        $attendance = Attendance::getAttendance($semester, $section, $subjectId);
        return view('attendance.mark', ['students' => $students, 'attendance' => $attendance, 'subject' => $subjectId]);
    }

    public function saveAttendance(Request $request, $semester, $section, $subjectId)
    {
        $params = $request->all();
        unset($params['_token']);

        foreach ($params as $key => $attendance) {
            if($attendance) {
                $attendance = strtoupper($attendance);
                if(in_array($attendance, ['A', 'L', 'P', 'S'])) {
                    $attributes = explode('_', $key);
                    $studentId = $attributes[1];
                    $date = $attributes[3].' 00:00:00';
                    Attendance::updateOrCreate([
                        'semester' => $semester,
                        'section' => $section,
                        'subject_id' => $subjectId,
                        'date' => $date,
                        'student_id' => $studentId,
                    ], ['attendance' => $attendance]);
                }
            }
        }

        return redirect()->route('attendance.mark', [$semester, $section, $subjectId]);
    }
}
