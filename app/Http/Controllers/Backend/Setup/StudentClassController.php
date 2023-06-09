<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;


class StudentClassController extends Controller
{
    //
    public function ViewStudent(){

        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    } // End Method

    public function StudentClassAdd(){

        return view('backend.setup.student_class.add_class');

    } // End Method

    public function StudentClassStore(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);

    } // End Method

    public function StudentClassEdit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editData'));

    } // End Method

    public function StudentClassUpdate(Request $request, $id){
        $data = StudentClass::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id,

        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);

    } // End Method

    public function StudentClassDelete($id){
        $user = StudentClass::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('student.class.view')->with($notification);

    } // End Method


}
