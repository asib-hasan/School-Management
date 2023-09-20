<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';
    static public function getRecord(){
       $return = self::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('class','class.id','=','class_subject.class_id')
            ->join('subject','subject.id','=','class_subject.subject_id')
            ->join('users','users.id','=','class_subject.created_by')
            ->where('class_subject.is_deleted','=',0);
            if(!empty(Request::get('class_name'))){   
                $return = $return->where('class.name','like','%'.Request::get('class_name').'%');
            }
            if(!empty(Request::get('subject_name'))){   
                $return = $return->where('subject.name','like','%'.Request::get('subject_name').'%');
            }
            else if(!empty(Request::get('date'))){
                $return = $return->where('class_subject.created_at','=',Request::get('date'));
            }
            else if(!empty(Request::get('type'))){
                $return = $return->where('subject.type','=',Request::get('type'));
            }
             
           $return = $return ->orderBy('class_subject.id','desc')
                            ->paginate(5);
            return $return;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getAlreadyfirst($class_id, $subject_id){
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }

    static public function getAssignSubjectID($class_id){
        return self::where('class_id','=',$class_id)
                    ->where('is_deleted','=',0)
                    ->get();
    }
}
