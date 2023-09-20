<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function searchattendance(){
        $data['getClass'] = ClassModel::where('is_deleted',0)->where('status',0)->get();
        return view('admin.attendance.search',$data);
    }

    public function generateattendance(Request $request){
        $class_id = $request->class_id;
        $getStudent = Student::where('is_deleted',0)->where('class_id',$class_id)->get();
        $pdf = PDF::loadView('admin.attendance.generate', [
            'student'=>$getStudent,
            'isRemoteEnabled' => true,
        ])->setOptions(['defaultFont' => 'sans-serif'
        ])->setPaper('a4','landscape');
       
      // download PDF file with download method
       return $pdf->stream();
    }

    public function searchadmit(){
        return view('admin.admit_card.search');
    }

    public function generateadmitcard(Request $request){
        $student_id = $request->student_id;
        $getStudent = Student::where('is_deleted',0)->where('id',$student_id)->get();
        $pdf = PDF::loadView('admin.admit_card.generate', [
            'student'=>$getStudent,
            'isRemoteEnabled' => true,
        ])->setOptions(['defaultFont' => 'sans-serif'
        ])->setPaper('landscape');
       
      // download PDF file with download method
       return $pdf->stream();
    }
}
