<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        $students = Student::get();
        return view('admin.students.index',compact('students'));
    }

    //=============Ajax Search Starts=================

    public function search()
    {
        
        return view('search');
    }

    public function action(Request $request)
    {
       if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('students')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('batch', 'like', '%'.$query.'%')
         ->orWhere('description', 'like', '%'.$query.'%')
         ->get();

      }
      else
      {
       $data = DB::table('students')
         ->orderBy('name', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->batch.'</td>
         <td>'.$row->description.'</td>
         <td>
         <img src="'. asset('images/'.$row->pro_pic).'" class="img-responsive img-thumbnail" width="150">
         </td>
         <td>
         <img src="'. asset('images/'.$row->pro_pic).'" class="img-responsive img-thumbnail" width="150">
         </td>

         <td>
            <a href="'. url('students/'.$row->id).'" class="btn btn-success btn-xs ml-0" title="Edit Students">View</a>
         </td>
         <td>
            <a href="'. url('students/'.$row->id).'" class="btn btn-success btn-xs ml-0" title="Edit Students">View</a>
         </td>



        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    //=============Ajax Search Ends=================




}
