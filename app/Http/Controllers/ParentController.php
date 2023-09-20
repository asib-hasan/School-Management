<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\Student;
use PDF;
use Hash;

class ParentController extends Controller
{
    public function list(){
        $data['header_title'] = "Parent List";
        $data['getRecord'] = ParentModel::getParent();
        return view('admin.parent.list',$data);
    }
    public function add(){
        $data['header_title'] = "Add New Parent";
        return view('admin.parent.add',$data);
    }
    public function insert(Request $request){

        // $request->validate([
        //     'name'=>'required',
        //     'email'=> 'required|email',
        //     'phone'=>'required',
        //     'address'=>'required',
        // ]);

            

        $save = new ParentModel();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/parents', $filename);
            $save->image = $filename;
        }
        $save->first_name = $request->first_name;
        $save->last_name = $request->last_name;
        $save->gender = $request->gender;
        $save->phone = $request->phone;
        $save->status = $request->status;
        $save->address = $request->address;
        $save->occupation = $request->occupation;
        $save->email = $request->email;
        $save->save();
        $user = new User();
        $user->name = trim($request->first_name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 4;
        $user->save();
        return redirect('admin/parent/list')->with('success','Parent Added Successfully');
    }
    public function update(Request $request){
        $id = $request->id;
        $save = ParentModel::getSingle($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/parents', $filename);
            $save->image = $filename;
        }
        $save->first_name = $request->first_name;
        $save->last_name = $request->last_name;
        $save->gender = $request->gender;
        $save->phone = $request->phone;
        $save->status = $request->status;
        $save->address = $request->address;
        $save->occupation = $request->occupation;
        $save->email = $request->email;
        $save->save();
        $user = User::getSingle($id);
        $user->name = trim($request->first_name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 4;
        $user->save();
        return redirect('admin/parent/list')->with('success','Parent updated Successfully');
    }

    public function edit($id){
        $data['getRecord'] = ParentModel::getSingle($id);
        return view('admin.parent.edit', $data);
    }

    public function myStudent($id){
        $data['header_title'] = "Parent Student";
        $data['getRecord'] = Student::getStudent();
        $data['parentId'] = $id;
        $data['getclass'] = ClassModel::getClass();
        $data['AssignedStudent'] = Student::where('parent_id',$id)->where('is_deleted',0)->get(); 
        //dd($data['AssignedStudent']);
        return view('admin.parent.my-student',$data);
    }       

    public function deleteStudent($id){
        
        $save = Student::find($id);
        $parent_id = $save->parent_id;
        $save->parent_id=null;
        $save->save();
        return $this->myStudent($parent_id);  // Call another function
    }

    public function assignStudent($student_id, $parent_id){
       
        $save = Student::find($student_id);
        $save->parent_id=$parent_id;
        $save->save();
        
        return $this->myStudent($parent_id);
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
