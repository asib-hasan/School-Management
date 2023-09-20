<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;
use Hash;
class StudentController extends Controller
{

    public function list(){
        $data['header_title'] = "Student List";
        $data['getRecord'] = Student::getStudent();
        $data['getClass'] = ClassModel::where('is_deleted',0)->where('status',0)->get();
        $data['records'] = Student::paginate(3); // Replace 'YourModel' with your actual model class.
        $data['totalStudent'] = Student::count();
        return view('admin.student.list',$data);
    }
    public function add(){
        $data['header_title'] = "Add New Student";
        $data['getRecord'] = ClassModel::getData();
        return view('admin.student.add',$data);
    }
    public function insert(Request $request){

        // $request->validate([
        //     'name'=>'required',
        //     'email'=> 'required|email',
        //     'phone'=>'required',
        //     'address'=>'required',
        // ]);

            

        $stu = new Student();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/students', $filename);
            $stu->photo = $filename;
        }
        $stu->first_name = $request->first_name;
        $stu->last_name = $request->last_name;
        $stu->admission_number = $request->admission_number;
        $stu->roll_number = $request->roll_number;
        $stu->father = $request->father;
        $stu->mother = $request->mother;
        $stu->class_id = $request->class_id;
        $stu->admission_date = $request->admission_date;
        $stu->gender = $request->gender;
        $stu->dob = $request->dob;
        $stu->religion = $request->religion;
        $stu->mobile = $request->mobile;
        $stu->blood_group = $request->blood_group;
        $stu->status = $request->status;
        $stu->save();
        $user = new User();
        $user->name = trim($request->first_name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 3;
        $user->save();
        return redirect('admin/student/list')->with('success','Student Added Successfully');
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
