<?php

namespace App\Http\Controllers;

use App\Models\ACHeadModel;
use Illuminate\Http\Request;
use Auth;
class ACHeadController extends Controller
{
    public function list(){
        $data['header_title'] = "AC Head List";
        $data['getRecord'] = ACHeadModel::getRecord();
        return view('admin.ac_head.list',$data);
    }
    public function add(){
        $data['header_title'] = 'Add New Class';
        return view('admin.ac_head.add',$data);
    }
    public function edit($id){
        
        $data['getRecord'] = ACHeadModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit AC Head';
            return view('admin.ac_head.edit',$data);
        }
        else{
            abort(404);
        }
    }
    public function insert(Request $request){
        $save = new ACHeadModel;
        $save->name = $request->name;
        $save->category_type = $request->category_type;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/ac_head/list')->with('success','AC Head successfully added');
    }
    public function update($id, Request $request){
        $save = ACHeadModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->category_type = $request->category_type;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/ac_head/list')->with('success','AC Head successfully updated');
    }
    public function delete($id){
        $save = ACHeadModel::getSingle($id);
        $save->is_deleted = 1;
        $save->save();
        return redirect('admin/ac_head/list')->with('success','AC Head successfully deleted');
    }
}
