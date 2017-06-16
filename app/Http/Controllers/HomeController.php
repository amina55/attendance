<?php

namespace App\Http\Controllers;

use App\AssignSubject;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->type == 'admin') {
            return $this->admin();
        }else {
            return $this->teacher();
        }
    }
    public function admin()
    {
        return view('home');
    }

    public function teacher()
    {
        $subjects = AssignSubject::getTeachersSubjects(Auth::user()->teacher_id);
        return view('attendance.home', ['subjects' => $subjects]);
    }
}
