<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getRecord(){
        $ret = SubjectModel::select('subject.*','users.name as created_by_name')
              ->join('users','users.id', '=', 'subject.created_by');
        if(!empty(Request::get('name'))){   
            $ret = $ret->where('subject.name','like','%'.Request::get('name').'%');
        }
        else if(!empty(Request::get('date'))){
            $ret = $ret->where('subject.created_at','=',Request::get('date'));
        }
        else if(!empty(Request::get('type'))){
            $ret = $ret->where('subject.type','=',Request::get('type'));
        }
        
        $ret = $ret->where('subject.is_deleted','=',0)
        ->orderBy('subject.id','desc')
        ->paginate(4);
        return $ret;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getSubject(){
        $ret = SubjectModel::select('subject.*')
              ->join('users','users.id', '=', 'subject.created_by')
              ->where('subject.is_deleted','=',0)
              ->where('subject.status','=',0)
              ->orderBy('subject.name','asc')
              ->get();
        return $ret;
    }
}
