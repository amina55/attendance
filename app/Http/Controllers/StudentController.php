<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  $semesterId $section
     * @param  $section
     * @return \Illuminate\Http\Response
     */
    public function index($semesterId, $section)
    {
        $students = Student::where(['semester'=> $semesterId, 'section' => $section])->get();
        return  view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', ['student' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreateRequest $request)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        $rollNo = Student::where(['semester' => $parameters['semester'], 'section' => $parameters['section']])->max('roll_no');
        $parameters['roll_no'] = ($rollNo) ? $rollNo+1 : 1;
        Student::firstOrCreate($parameters);
        return redirect()->route('student.list', [$parameters['semester'], $parameters['section']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.create', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentCreateRequest|Request $request
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentCreateRequest $request, Student $student)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        unset($parameters['_method']);
        Student::where('id', $student->id)->update($parameters);
        return redirect()->route('student.list', [$parameters['semester'], $parameters['section']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $studentId
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentId)
    {
        Student::where('id', $studentId)->delete();
        return redirect()->back();
    }
}
