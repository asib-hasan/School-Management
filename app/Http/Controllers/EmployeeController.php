<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee_list(){
        $data = Employee::get();
        return view('employee-list',compact('data'));
    }

    public function add_employee(){
        return view('add-employee');
    }
    public function save_employee(Request $request){

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $gender = $request->gender;
        $designation = $request->designation;
        $password = $request->password;

        $stu = new Employee();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/employees', $filename);
            $stu->image = $filename;
        }
        $stu->name = $name;
        $stu->designation = $designation;
        $stu->gender = $gender;
        $stu->password = $password;
        $stu->email = $email;
        $stu->phone = $phone;
        $stu->save();

        return redirect('employee-list')->with('success','Employee Added Successfully');
    }
    public function employee_monthly(){
        return view('employee-monthly');
    }
}
