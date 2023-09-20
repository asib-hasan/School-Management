<?php

use App\Http\Controllers\ACHeadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[AuthController::class,'login']);
Route::get('logout',[AuthController::class,'logout']);
Route::post('login',[AuthController::class,'Authlogin']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('student-list',[AdminController::class,'student_list']);
Route::get('add-student',[AdminController::class,'add_student']);
Route::get('fees-list',[FeeController::class,'fees_list']);
Route::get('add-fees',[FeeController::class,'add_fees']);
Route::post('save-student',[StudentController::class,'saveStudent']);
Route::post('save-fees',[FeeController::class,'saveFees']);
Route::any('student-id',[StudentController::class,'student_id']);
Route::get('generate-id',[StudentController::class,'generate_id']);
Route::get('add-employee',[EmployeeController::class,'add_employee']);
Route::post('save-employee',[EmployeeController::class,'save_employee']);
Route::get('employee-list',[EmployeeController::class,'employee_list']);
Route::get('employee-monthly',[EmployeeController::class,'employee_monthly']);
Route::get('marks-entry',[ResultController::class,'marks_entry']);
Route::get('result-indiv',[ResultController::class,'result_indiv']);
Route::post('findindividualresult',[ResultController::class,'findindividualresult']);


Route::group(['middleware' => 'admin'],function(){
    //Admin
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/admin/list',[AdminController::class,'list']);
    Route::get('admin/admin/add',[AdminController::class,'add']);
    Route::post('admin/admin/save',[AdminController::class,'insert']);
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);

    //Student
    Route::get('admin/student/list',[StudentController::class,'list']);
    Route::get('admin/student/add',[StudentController::class,'add']);
    Route::post('admin/student/save',[StudentController::class,'insert']);
    Route::get('admin/student/edit/{id}',[StudentController::class,'edit']);
    Route::get('admin/student/delete/{id}',[StudentController::class,'delete']);

    //Parent
    Route::get('admin/parent/list',[ParentController::class,'list']);
    Route::get('admin/parent/add',[ParentController::class,'add']);
    Route::post('admin/parent/save',[ParentController::class,'insert']);
    Route::post('admin/parent/update/',[ParentController::class,'update']);
    Route::get('admin/parent/edit/{id}',[ParentController::class,'edit']);
    Route::get('admin/parent/delete/{id}',[ParentController::class,'delete']);
    Route::get('admin/parent/my-student/{id}',[ParentController::class,'myStudent']);
    Route::get('admin/parent/assign/{student_id}/{parent_id}',[ParentController::class,'assignStudent']);
    Route::get('admin/parent/assigned/delete/{id}',[ParentController::class,'deleteStudent']);


    //Class
    Route::get('admin/class/list',[ClassController::class,'list']);
    Route::get('admin/class/add',[ClassController::class,'add']);
    Route::post('admin/class/save',[ClassController::class,'insert']);
    Route::post('admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::get('admin/class/delete/{id}',[ClassController::class,'delete']);

    //Exam
    Route::get('admin/exam/list',[ExamController::class,'list']);
    Route::get('admin/exam/add',[ExamController::class,'add']);
    Route::post('admin/exam/save',[ExamController::class,'insert']);
    Route::post('admin/exam/edit/{id}',[ExamController::class,'update']);
    Route::get('admin/exam/edit/{id}',[ExamController::class,'edit']);
    Route::get('admin/exam/delete/{id}',[ExamController::class,'delete']);

    //Subject
    Route::get('admin/subject/list',[SubjectController::class,'list']);
    Route::get('admin/subject/add',[SubjectController::class,'add']);
    Route::post('admin/subject/save',[SubjectController::class,'insert']);
    Route::post('admin/subject/edit/{id}',[SubjectController::class,'update']);
    Route::get('admin/subject/edit/{id}',[SubjectController::class,'edit']);
    Route::get('admin/subject/delete/{id}',[SubjectController::class,'delete']);

    //Assign Subject
    Route::get('admin/assign_subject/list',[ClassSubjectController::class,'list']);
    Route::get('admin/assign_subject/add',[ClassSubjectController::class,'add']);
    Route::post('admin/assign_subject/save',[ClassSubjectController::class,'insert']);
    Route::post('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'update']);
    Route::get('admin/assign_subject/edit/{id}',[ClassSubjectController::class,'edit']);
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectController::class,'delete']);

    //Marks Register
    Route::get('admin/examinations/marks_register',[MarksController::class,'marks_register']);
    Route::get('admin/examinations/marks_entry',[MarksController::class,'marks_entry'])->name('mark_entry');
    Route::get('admin/examinations/marks_insert',[MarksController::class,'marks_insert'])->name('mark_insert');
    
    //ac_head 
    Route::get('admin/ac_head/list',[ACHeadController::class,'list']);
    Route::get('admin/ac_head/add',[ACHeadController::class,'add']);
    Route::post('admin/ac_head/save',[ACHeadController::class,'insert']);
    Route::post('admin/ac_head/edit/{id}',[ACHeadController::class,'update']);
    Route::get('admin/ac_head/edit/{id}',[ACHeadController::class,'edit']);
    Route::get('admin/ac_head/delete/{id}',[ACHeadController::class,'delete']);

    //student_fee
    Route::get('admin/student_fee/list',[FeesController::class,'list']);
    Route::get('admin/student_fee/add',[FeesController::class,'add']);
    Route::post('admin/student_fee/save',[FeesController::class,'insert']);
    Route::post('admin/student_fee/edit/{id}',[FeesController::class,'update']);
    Route::get('admin/student_fee/edit/{id}',[FeesController::class,'edit']);
    Route::get('admin/student_fee/delete/{id}',[FeesController::class,'delete']);
    Route::get('admin/student_fee/waiver/{id}',[FeesController::class,'waiver']);

    // Attendance Sheet
    Route::get('admin/attendance/search',[ReportController::class,'searchattendance']);
    Route::get('admin/attendance/generateattendance',[ReportController::class,'generateattendance']);
    //Admit Card
    Route::get('admin/admit/search',[ReportController::class,'searchadmit']);
    Route::get('admin/admit/generateadmitcard',[ReportController::class,'generateadmitcard']);

});

Route::group(['middleware' => 'teacher'],function(){
    Route::get('teacher/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'student'],function(){
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'parent'],function(){
    Route::get('parent/dashboard',[DashboardController::class,'dashboard']);
});
