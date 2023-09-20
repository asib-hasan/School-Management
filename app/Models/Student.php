<?php

namespace App\Models;
use Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';

    static public function getStudent(){
        $ret = Student::select('student.*',);
        if(!empty(Request::get('name'))){ 
            //dd(Request::get('name'));  
            $ret = $ret->where('first_name','like','%'.Request::get('name').'%');
        }
        else if(!empty(Request::get('id'))){
            $ret = $ret->where('id','=',Request::get('id'));
        }
        $ret = $ret->get();
        
        
        return $ret;
    }

    static public function AssignedStudent(){
        
    }

    static public function getClass(){
        $return = ClassModel::select('class.*')
                ->get();
        return $return;
    }
}
