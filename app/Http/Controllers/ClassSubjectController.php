<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Auth;
class ClassSubjectController extends Controller
{
    public function list(){
        $data['header_title'] = "Subject Assign List";
        $data['getRecord'] = ClassSubjectModel::getRecord();
        return view('admin.assign_subject.list',$data);
    }
    public function add(){
        $data['header_title'] = 'Add Assign Subject';
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        return view('admin.assign_subject.add',$data);
    }
    public function edit($id){
        
        $data['getRecord'] = ClassModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit Class';
            return view('admin.class.edit',$data);
        }
        else{
            abort(404);
        }
    }
    public function insert(Request $request){
        if(!empty($request->subject_id)){
            foreach ($request->subject_id as $i) {
                $getAlreadyfirst = ClassSubjectModel::getAlreadyfirst($request->class_id,$i);
                if(!empty($getAlreadyfirst)){
                    $getAlreadyfirst->status = $request->status;
                    $getAlreadyfirst->save();
                }
                else{
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id =$i;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_subject/add')->with('success','Assigned Subject Successfully');
        }
        else{
                return redirect('admin/assign_subject/add')->with('error','Something wrong, please try again');
        }
    }
    public function update($id, Request $request){
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/class/list')->with('success','Class successfully updated');
    }
    public function delete($id){
        $save = ClassModel::getSingle($id);
        $save->is_deleted = 1;
        $save->save();
        return redirect('admin/class/list')->with('success','Class successfully deleted');
    }
}
