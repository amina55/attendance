<?php

namespace App\Http\Controllers;

use App\AssignSubject;
use App\Http\Requests\SubjectCreateRequest;
use App\Subject;
use App\Teacher;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjectId)
    {
        $subjects = Subject::where(['semester'=> $subjectId])->get();
        return  view('subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('subject.create', ['subject' => null, 'teachers' => $teachers, 'teacherA' => null, 'teacherB' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request|SubjectCreateRequest  $request
     * @return string $route
     */
    public function store(SubjectCreateRequest $request)
    {
        $parameters = $request->all();
        unset($parameters['_token']);

        if($parameters['teacher_section_A'] == $parameters['teacher_section_B'] && $parameters['period_section_A'] == $parameters['period_section_B']) {
            $route = redirect()->back()->withInput()->withErrors(['period_section_B' => "You can not assign a Teacher to Section at same Period. Please re-schedule."]);
        } else {
            $period = AssignSubject::getTeacherAssignPeriod($parameters['teacher_section_A'], $parameters['period_section_A']);
            if($period) {
                $route = redirect()->back()->withInput()->withErrors(['teacher_section_A' => "Teacher's period  is booked. Kindly re-schedule."]);
            } else {
                $period = AssignSubject::getTeacherAssignPeriod($parameters['teacher_section_B'], $parameters['period_section_B']);
                if($period) {
                    $route = redirect()->back()->withInput()->withErrors(['teacher_section_B' => "Teacher's period  is booked. Kindly re-schedule."]);
                } else {
                    $subject = Subject::firstOrCreate([
                        'semester' => $parameters['semester'],
                        'name' => $parameters['name'],
                        'short_key' => $parameters['short_key'],
                        'credit_hour' => $parameters['credit_hour'],
                    ]);

                    AssignSubject::firstOrCreate([
                        'subject_id' => $subject->id,
                        'teacher_id' => $parameters['teacher_section_A'],
                        'period' => $parameters['period_section_A'],
                        'section' => 'A',
                    ]);

                    AssignSubject::firstOrCreate([
                        'subject_id' => $subject->id,
                        'teacher_id' => $parameters['teacher_section_B'],
                        'period' => $parameters['period_section_B'],
                        'section' => 'B',
                    ]);
                    $route = redirect()->route('subject.list', [$parameters['semester']]);
                }
            }
        }
        return $route;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subject.show', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        $teacherA = AssignSubject::getSubjectSection($subject->id, 'A');
        $teacherB = AssignSubject::getSubjectSection($subject->id, 'B');
        return view('subject.create', ['subject' => $subject, 'teachers' => $teachers, 'teacherA' => $teacherA, 'teacherB' => $teacherB]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request|SubjectCreateRequest  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectCreateRequest $request, Subject $subject)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        unset($parameters['_method']);

        $subjectId = $subject->id;
        if($parameters['teacher_section_A'] == $parameters['teacher_section_B'] && $parameters['period_section_A'] == $parameters['period_section_B']) {
            $route = redirect()->back()->withInput()->withErrors(['period_section_B' => "You can not assign same Period. Please re-schedule."]);
        } else {
            $period = AssignSubject::getTeacherAssignPeriod($parameters['teacher_section_A'], $parameters['period_section_A'], $subjectId);
            if($period) {
                $route = redirect()->back()->withInput()->withErrors(['teacher_section_A' => "Teacher's period  is booked. Kindly re-schedule."]);
            } else {
                $period = AssignSubject::getTeacherAssignPeriod($parameters['teacher_section_B'], $parameters['period_section_B'], $subjectId);
                if($period) {
                    $route = redirect()->back()->withInput()->withErrors(['teacher_section_B' => "Teacher's period  is booked. Kindly re-schedule."]);
                } else {
                    Subject::updateOrCreate(['id' => $subjectId], [
                        'semester' => $parameters['semester'],
                        'name' => $parameters['name'],
                        'credit_hour' => $parameters['credit_hour'],
                    ]);

                    AssignSubject::updateOrCreate(['subject_id' => $subjectId, 'section' => 'A'], [
                        'teacher_id' => $parameters['teacher_section_A'],
                        'period' => $parameters['period_section_A'],
                    ]);

                    AssignSubject::updateOrCreate(['subject_id' => $subjectId, 'section' => 'B'], [
                        'teacher_id' => $parameters['teacher_section_B'],
                        'period' => $parameters['period_section_B'],
                    ]);
                    $route = redirect()->route('subject.list', [$parameters['semester']]);
                }
            }
        }
        return $route;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $subjectId
     * @return \Illuminate\Http\Response
     */
    public function destroy($subjectId)
    {
        Subject::where('id', $subjectId)->delete();
        return redirect()->back();
    }
}
