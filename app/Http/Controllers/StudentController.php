<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


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
             'student_pic'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

        $newStudent = new Student();

        if ($request->hasFile('student_pic')) {
            $image = $request->file('student_pic');

            $pic = $image->getClientOriginalName();
            $input = time().$pic;

            $destinationPath = public_path('/thumbnail');
//            $destinationPath = public_path('/images/');

            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input);

            // $fileName = 'images/'.$fileName;

            $newStudent->pro_pic =$input;
        }

        $newStudent->name = $request->name;
        $newStudent->batch = $request->batch;
        $newStudent->description = $request->description;

        $newStudent->save();

        Toastr::success('Tag Successfully Saved :)' ,'Success');

        return redirect()->route('students.index');

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
            $pic = $student->pro_pic;
            $path_1 = public_path().'/images/'.$pic;
            $path_2 = public_path().'/thumbnail/'.$pic;

            if (file_exists($path_1)) {
                unlink($path_1);
            }

            if (file_exists($path_2)) {
                unlink($path_2);
            }

            $image = $request->file('student_pic');

            $pic = $image->getClientOriginalName();
            $input = time().$pic;

            $destinationPath = public_path('/thumbnail');
//            $destinationPath = public_path('/images/');

            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input);

            $student->pro_pic = $input;
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
    public function destroy($id)
    {
        $student = Student::find($id);
        $pic = $student->pro_pic;
        $path_1 = public_path().'/images/'.$pic;
        $path_2 = public_path().'/thumbnail/'.$pic;

        if (file_exists($path_1)) {
            unlink($path_1);
            
       }
        if (file_exists($path_2)) {
            unlink($path_2);

        }

//        $studentDelete = Student::find($id);
        $student->delete();

        Toastr::success('Successfully deleted :)' ,'Success');
        return redirect()->route('students.index')->with('message','Student successfully Deteted');
    }
    
}
