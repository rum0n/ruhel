<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $students = Student::all();
        return view('admin.students.index',compact('students'));
    }
}
