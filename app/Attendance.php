<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public static function getAttendance($semester, $section, $subjectId)
    {
        return self::where(['semester' => $semester, 'section' => $section, 'subject_id' => $subjectId])->with('student')->get();
    }
}
