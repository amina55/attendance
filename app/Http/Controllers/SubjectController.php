<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

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
        return view('subject.create', ['subject' => null, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        /*Subject::firstOrCreate($parameters);
        return redirect()->route('subject.list', [$parameters['semester'], $parameters['section']]);*/
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
        return view('subject.create', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $parameters = $request->all();
        unset($parameters['_token']);
        unset($parameters['_method']);
        Subject::where('id', $subject->id)->update($parameters);
        return redirect()->route('subject.list', [$parameters['semester'], $parameters['section']]);
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
