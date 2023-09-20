<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamModel;
use App\Models\FinalMarksModel;
use App\Models\MarksModel;
use App\Models\Student;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
class MarksController extends Controller
{
    public function marks_register(){
        $data['getClass'] = ClassModel::where('is_deleted',0)->get();
        $data['getSubject'] = SubjectModel::where('is_deleted',0)->get();
        $data['getStudent'] = Student::where('is_deleted',0)->get();
        $data['getExam'] = ExamModel::where('is_deleted',0)->where('status',0)->get();
        //$student = StudentInfo::where('reg', $reg)->first();
        return view('admin.examinations.marks_register',$data);
    }
    public function marks_entry(Request $request){
        
        $year = $request->year;
       // dd($year);
        $class_id = $request->class_id;
        $exam = $request->exam;
        $data['getExam'] = ExamModel::where('is_deleted',0)
                                        ->where('status',0)
                                        ->get();
        $data['getClass'] = ClassModel::where('is_deleted',0)->get();
        $data['getSubject'] = ClassSubjectModel::select('class_subject.*','subject.name as name')
                                                ->join('subject','subject.id','=','class_subject.subject_id')
                                                ->where('class_subject.class_id',$class_id)
                                                ->get();
        $data['getStudent'] = Student::where('class_id',$class_id)
                                        ->where('is_deleted',0)
                                        ->where('status',0)
                                        ->get();
        $data['yeared'] = $year;
       // dd('year');
        $data['class'] = $class_id;
        $data['exam'] = $exam;
        return view('admin.examinations.marks_register',$data);    
    }
    public function marks_insert(Request $request){
        
        $student_id = $request->input('student_id');
        $exam = $request->input('exam');
        $year = $request->input('year');
        $class_id = $request->input('class_id');
        if($request->result==null){
            $result = MarksModel::
                             where('student_id',$student_id)
                            ->where('exam',$exam)
                            ->where('year',$year)
                            ->sum('gpa');
            $subject_count = ClassSubjectModel::where('class_id',$class_id)
                            ->count('subject_id');
            $save = new FinalMarksModel();
            $save->student_id = $student_id;
            $save->year = $year;
            $save->exam = $exam;

            $result = $result/($subject_count);
           
            if($result==5.00){
                $grade='A+';
                $save->grade = $grade;
                $gpa = 5.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=4.00 && $result<80){
                $grade = 'A';
                $save->grade = $grade;
                $gpa = 4.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }

            else if($result>=3.50 && $result<70){
                $grade = 'A-';
                $save->grade = $grade;
                $gpa = 3.50;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=3.00){
                $grade = 'B';
                $save->grade = $grade;
                $gpa = 3.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=2.00 ){
                $grade = 'C';
                $save->grade = $grade;
                $gpa = 2.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=1.00){
                $grade = 'D';
                $save->grade = $grade;
                $gpa = 1.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else{
                $grade = 'F';
                $save->grade = $grade;
                $gpa = 0.00;
                $save->gpa = $gpa;
                $res = 'fail';
            }
            $save->save();
            $responseData = [
                'grade' => $grade,
                'gpa' => $gpa,
                'res' =>$res,
                'student_id'=>$student_id,
                
            ];    
            return response()->json($responseData);
        }
        $subject_id=$request->input('subject_id');
        $result = intval($request->input('result'));

        $save = MarksModel::where('subject_id',$subject_id)
                            ->where('student_id',$student_id)
                            ->where('exam',$exam)
                            ->where('year',$year)
                            ->first();
        if($save){
            $save->result = $result;
            
            if($result>=80){
                $grade='A+';
                $gpa = 5.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=70 && $result<80){
                $grade = 'A';
                $gpa = 4.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }

            else if($result>=60 && $result<70){
                $grade = 'A-';
                $gpa = 3.50;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=50 && $result<60){
                $grade = 'B';
                $gpa = 3.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=40 && $result<50){
                $grade = 'C';
                $gpa = 2.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=33 && $result<40){
                $grade = 'D';
                $gpa = 1.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else{
                $grade = 'F';
                $gpa = 0.00;
                $save->gpa = $gpa;
                $res = 'fail';
            }
            $save->save();
            $responseData = [
                'grade' => $grade,
                'gpa' => $gpa,
                'res' =>$res,
                'student_id'=>$student_id,
                'subject_id'=>$subject_id,
            ];
            //dd('Response from here');
        
            return response()->json($responseData);
        }
        else{
            //dd('Inside else');
            $save = new MarksModel();
            $save->class_id=$class_id;
            $save->exam=$exam;
            $save->year=$year;
            $save->subject_id=$subject_id;
            $save->student_id = $student_id;
            $save->result=$result;
           // $save->save();
            
            if($result>=80){
                $grade='A+';
                $gpa = 5.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=70 && $result<80){
                $grade = 'A';
                $gpa = 4.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }

            else if($result>=60 && $result<70){
                $grade = 'A-';
                $gpa = 3.50;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=50 && $result<60){
                $grade = 'B';
                $gpa = 3.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=40 && $result<50){
                $grade = 'C';
                $gpa = 2.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else if($result>=33 && $result<40){
                $grade = 'D';
                $gpa = 1.00;
                $save->gpa = $gpa;
                $res = 'pass';
            }
            else{
                $grade = 'F';
                $gpa = 0.00;
                $save->gpa = $gpa;
                $res = 'fail';
            }
            $save->save();
            $responseData = [
                'grade' => $grade,
                'gpa' => $gpa,
                'res' =>$res,
                'student_id'=>$student_id,
                'subject_id'=>$subject_id,
            ];
        
            return response()->json($responseData);
        }
    }
}
