<?php

namespace App\Http\Controllers;
use App\Models\ACHeadModel;
use App\Models\ClassModel;
use App\Models\Fees;
use App\Models\FeesModel;
use Illuminate\Http\Request;
use Auth;
class FeesController extends Controller
{
    public function list(){
        $data['header_title'] = "Student fees category";
        $data['getRecord'] = FeesModel::getRecord();
        return view('admin.student_fee.list',$data);
    }
    public function add(){
        $data['header_title'] = 'Add New Fees Category';
        $data['getHead'] = ACHeadModel::where('is_deleted',0)->where('status',0)->get();
        $data['getClass'] = ClassModel::where('is_deleted',0)->where('status',0)->get();
        return view('admin.student_fee.add',$data);
    }
    public function edit($id){
        
        $data['getRecord'] = FeesModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit AC Head';
            return view('admin.student_fee.edit',$data);
        }
        else{
            abort(404);
        }
    }
    public function insert(Request $request){
        $save = new FeesModel;
        $save->name = $request->class_id;
        $save->ac_head = $request->ac_head;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/student_fee/list')->with('success','Fees category successfully added');
    }
    public function update($id, Request $request){
        $save = FeesModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->category_type = $request->category_type;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/student_fee/list')->with('success','Fees category successfully updated');
    }
    public function delete($id){
        $save = FeesModel::getSingle($id);
        $save->is_deleted = 1;
        $save->save();
        return redirect('admin/student_fee/list')->with('success','Fees category successfully deleted');
    }
}
