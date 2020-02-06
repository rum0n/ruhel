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
/*
Route::get('/abc', function () {
    return view('welcome');
});
*/

// Route::get('/', 'HomeController@index');
// Route::get('/men/cloth','CategoryController@men_cloth');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'AdminController@dashboard')->name('admin_dashboard');

// Route::get('/inesrt/student', 'StudentController@insertStudent');
// Route::post('/add/student', 'StudentController@addStudent');

// Route::get('/all/student', 'StudentController@allStudent')->name('all.student');

// Route::get('/student/delete/{student_id}', 'StudentController@deleteStudent');


// Route::get('/student/edit/{student_id}', 'StudentController@editStudent');
// Route::post('/update/student/{id}', 'StudentController@updateStudent')->name('update');

Route::resource('students','StudentController');


Route::get('/search', 'AdminController@search')->name('ajax');
Route::get('/search/action', 'AdminController@action')->name('search.action');



