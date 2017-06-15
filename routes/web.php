<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $route = 'login';
    if(\Illuminate\Support\Facades\Auth::check()) {
       $route = 'home';
    }
    return redirect()->route($route);
});

Auth::routes();


Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('user/profile', 'UserController@showProfile')->name('profile');



    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function (){

        Route::group(['prefix' => 'student'], function (){
            Route::get('list/{id}/{section}', 'StudentController@index')->name('student.list');
            Route::get('destroy/{id}', 'StudentController@destroy')->name('student.destroy');

        });
        Route::resource('student', 'StudentController', ['except' => [
            'index', 'destroy'
        ]]);



        Route::group(['prefix' => 'subject'], function (){
            Route::get('/list/{id}', 'SubjectController@index')->name('subject.list');
            Route::get('destroy/{id}', 'StudentController@destroy')->name('subject.destroy');

        });
        Route::resource('subject', 'SubjectController', ['except' => [
            'index', 'destroy'
        ]]);

        Route::get('teacher/destroy/{id}', 'TeacherController@destroy')->name('teacher.destroy');
        Route::resource('teacher', 'TeacherController', ['except' => ['destroy']]);

    });
});