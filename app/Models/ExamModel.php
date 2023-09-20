<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ExamModel extends Model
{
    use HasFactory;
    protected $table = 'exam';
    static public function getRecord(){
        $ret = ExamModel::select('exam.*','users.name as created_by_name')
              ->join('users','users.id', '=', 'exam.created_by');
        if(!empty(Request::get('name'))){   
            $ret = $ret->where('exam.name','like','%'.Request::get('name').'%');
        }
        else if(!empty(Request::get('date'))){
            $ret = $ret->where('exam.created_at','=',Request::get('date'));
        }
        
        $ret = $ret->where('exam.is_deleted','=',0)
        ->orderBy('exam.id','desc')
        ->paginate(4);
        return $ret;
    }
    static public function getData(){
        $ret = ClassModel::select('exam.*','users.name as created_by_name')
              ->join('users','users.id', '=', 'exam.created_by');
        if(!empty(Request::get('name'))){   
            $ret = $ret->where('exam.name','like','%'.Request::get('name').'%');
        }
        else if(!empty(Request::get('date'))){
            $ret = $ret->where('exam.created_at','=',Request::get('date'));
        }
        
        $ret = $ret->where('exam.is_deleted','=',0)
        ->orderBy('exam.id','desc')
        ->paginate(400); //Din't work without paginate in classModel
        return $ret;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getExam(){
        $ret = ExamModel::select('exam.*')
              ->join('users','users.id', '=', 'exam.created_by');
        
        if(!empty(Request::get('name'))){   
            $ret = $ret->where('exam.name','like','%'.Request::get('name').'%');
        }
        $ret = $ret->where('exam.is_deleted','=',0)
              ->where('exam.status','=',0)
              ->orderBy('exam.name','asc')
              ->get();
        return $ret;
    }
}


