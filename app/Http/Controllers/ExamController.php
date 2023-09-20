<?php

namespace App\Http\Controllers;
use App\Models\ExamModel;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Auth;

class ExamController extends Controller
{
    public function list(){
        $data['header_title'] = "Exam List";
        $data['getRecord'] = ExamModel::getRecord();
        return view('admin.exam.list',$data);
    }
    public function add(){
        $data['header_title'] = 'Add New Class';
        return view('admin.exam.add',$data);
    }
    public function edit($id){
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit Class';
            return view('admin.exam.edit',$data);
        }
        else{
            abort(404);
        }
    }
    public function insert(Request $request){
        $save = new ExamModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/exam/list')->with('success','Exam successfully added');
    }
    public function update($id, Request $request){
        $save = ExamModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/exam/list')->with('success','Exam successfully updated');
    }
    public function delete($id){
        $save = ExamModel::getSingle($id);
        $save->is_deleted = 1;
        $save->save();
        return redirect('admin/class/list')->with('success','Exam successfully deleted');
    }
}
