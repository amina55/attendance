<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherCreateRequest;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create', ['teacher' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherCreateRequest $request)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        $teacher = Teacher::firstOrCreate($parameters);

        User::create([
            'name' => $parameters['name'],
            'username' => $parameters['unique_name'],
            'email' => $parameters['email'],
            'type' => 'teacher',
            'password' => bcrypt($parameters['unique_name']),
            'teacher_id' => $teacher->id
        ]);

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.create', ['teacher' => $teacher]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeacherCreateRequest|Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherCreateRequest $request, Teacher $teacher)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        unset($parameters['_method']);
        Teacher::where('id', $teacher->id)->update($parameters);
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {

    }
}
