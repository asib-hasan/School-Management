<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class ACHeadModel extends Model
{
    protected $table = 'ac_head';
    use HasFactory;

    static public function getRecord(){
        $ret = ACHeadModel::select('ac_head.*');
              
        if(!empty(Request::get('name'))){   
            $ret = $ret->where('name','like','%'.Request::get('name').'%');
        }
        else if(!empty(Request::get('category'))){
            $ret = $ret->where('category','=',Request::get('category'));
        }
        
        $ret = $ret->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->paginate(400); //Din't work without paginate in classModel
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
