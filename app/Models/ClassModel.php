<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    static public function getRecord(){
        $ret = ClassModel::select('class.*','users.name as created_by_name')
              ->join('users','users.id', '=', 'class.created_by');
        if(!empty(Request::get('name'))){   
            $ret = $ret->where('class.name','like','%'.Request::get('name').'%');
        }
        else if(!empty(Request::get('date'))){
            $ret = $ret->where('class.created_at','=',Request::get('date'));
        }
        
        $ret = $ret->where('class.is_deleted','=',0)
        ->orderBy('class.id','desc')
        ->paginate(4);
        return $ret;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getClass(){
        $ret = ClassModel::select('class.*')
              ->join('users','users.id', '=', 'class.created_by')
              ->where('class.is_deleted','=',0)
              ->where('class.status','=',0)
              ->orderBy('class.name','asc')
              ->get();
        return $ret;
    }
}


