<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index',compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.students.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'batch'=>'required',
        ]);

        $newStudent = new Student();

        $files = $request->student_pic;
        
        if ($request->hasFile('student_pic')) {

            $pic = $files->getClientOriginalName();
            $fileName = time().$pic;
            $files->move(public_path('images'),$fileName);
            $fileName = 'images/'.$fileName;
            $newStudent->pro_pic = $fileName;
        }

        $newStudent->name = $request->name;
        $newStudent->batch = $request->batch;
        $newStudent->description = $request->description;

        $newStudent->save();

        
        return redirect()->route('students.index')->with('message','Student Successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Student $student)
    {
        return view('admin.students.edit',compact('student'));
    }


    /*==================================================
    
     public function edit($edit_id)
    {
        $student = Student::findOrFail($edit_id);
        return view('students.edit',compact('student'));
    }

    ===================================================*/


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Student $student)
    {
        $this->validate($request,[
            'name'=>'required',
            'batch'=>'required',
        ]);


        $student->name = $request->name;
        $student->batch = $request->batch;
        $student->Description = $request->description;
        
        $files = $request->student_pic;

        if ($request->hasFile('student_pic')) {

            if (file_exists($student->pro_pic)) {
                unlink($student->pro_pic);
            }
            
            $pic = $files->getClientOriginalName();
            $fileName = time().$pic;
            $files->move(public_path('images'),$fileName);
            $fileName = 'images/'.$fileName;

            $student->pro_pic = $fileName;
        }

        $student->save();

        return redirect()->route('students.index')->with('message','Wel done! Student profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // $student = Student::find($id);
         
        // return $student;

        if (file_exists($student->pro_pic)) {
            unlink($student->pro_pic);
            //echo($student->pro_pic);
        }

        // $studentDelete = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')->with('message','Student successfully Deteted');
    }
    
}
