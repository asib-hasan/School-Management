<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
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

    //Class
    Route::get('admin/class/list',[ClassController::class,'list']);
    Route::get('admin/class/add',[ClassController::class,'add']);
    Route::post('admin/class/save',[ClassController::class,'insert']);
    Route::post('admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::get('admin/class/delete/{id}',[ClassController::class,'delete']);

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
