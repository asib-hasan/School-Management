<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class FeesModel extends Model
{
    protected $table = 'student_fee';
    use HasFactory;

    static public function getRecord(){
        $ret = FeesModel::select('student_fee.*');
              
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
}
