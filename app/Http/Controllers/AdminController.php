<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;   
class AdminController extends Controller
{
    
    public function list(){
        $data['header_title'] = "Admin List";
        $data['getRecord'] = User::getAdmin();
        return view('admin.admin.list',$data);
    }
    public function add(){
        $data['header_title'] = "New Admin";
        
        return view('admin.admin.add',$data);
    }
    public function insert(Request $request){
        $request->validate([
            'email'=>'required|email|unique:users'
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin successfully created');
    }
    public function edit($id){
        $data['getRecord'] = $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit',$data);
        }
        else{
            abort(404);
        }
    }
    public function update($id, Request $request){
        $user =  User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin successfully updated');
    }
    public function delete($id){
        $user =  User::getSingle($id);
        $user->is_deleted = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success','Admin successfully deleted');
    }
}
