<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;
use PDF;
class StudentController extends Controller
{
    public function saveStudent(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=> 'required|email',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $fathername = $request->fathername;
        $mothername = $request->mothername;
        $blood = $request->blood;
        $dob = $request->dob;
        $gender = $request->gender;
        $class = $request->class;
        $year = $request->year;
        $date = $request->date;
        $password = $request->password;
            

        $stu = new StudentInfo();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/students', $filename);
            $stu->image = $filename;
        }
        $stu->name = $name;
        $stu->fathername = $fathername;
        $stu->mothername = $mothername;
        $stu->dob = $dob;
        $stu->reg = $request->reg;
        $stu->blood = $blood;
        $stu->gender = $gender;
        $stu->class = $class;
        $stu->year = $year;
        $stu->password = $password;
        $stu->date = $date;
        $stu->email = $email;
        $stu->address = $address;
        $stu->phone = $phone;
        $stu->mothername=$mothername;
        $stu->save();

        return redirect()->back()->with('success','Student Added Successfully');
    }
    public function student_id(){
        return view('student-id');
    }
    public function generate_id(Request $request){

        $reg = $request->input('reg');
       // $student = StudentInfo::query();
        $student = StudentInfo::where('reg', $reg)->first();
        $student->where('reg',$reg);
        $pdf = PDF::loadView('generate-id', [
            'student'=>$student,
            'isRemoteEnabled' => true,
        ])->setOptions(['defaultFont' => 'sans-serif']);
       
      // download PDF file with download method
       return $pdf->stream();
    }
}
