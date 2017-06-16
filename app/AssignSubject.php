<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    protected $guarded = ['id'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public static function getTeacherAssignPeriod($teacherId, $period, $subjectId = null)
    {
        $query = AssignSubject::where(['teacher_id' => $teacherId, 'period' => $period]);
        if($subjectId) {
            $query->where('subject_id', '!=', $subjectId);
        }
        return $query->first();
    }

    public static function getSubjectSection($subjectId, $section)
    {
        return AssignSubject::where(['subject_id' => $subjectId, 'section' => $section])->first();

    }

    public static function getTeachersSubjects($teacherId)
    {
        return AssignSubject::where(['teacher_id' => $teacherId])->with('subject')->orderBy('period')->get();
    }
}
