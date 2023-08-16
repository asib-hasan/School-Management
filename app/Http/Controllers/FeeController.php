<?php

namespace App\Http\Controllers;
use App\Models\Fees;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function fees_list(){
        $data = Fees::all();
        return view('fees-list',compact('data'));
    }
    public function add_fees(){
        return view('add-fees');
    }

    public function saveFees(Request $request){
        $fee = new Fees();
        $fee->class = $request->class;
        $fee->year = $request->year;
        $fee->admissionfee = $request->admissionfee;
        $fee->labfee = $request->labfee;
        $fee->tuitionfee = $request->tuitionfee;
        $fee->monthlyfee = (int)($request->labfee + $request->tuitionfee)/12;
        $fee->save();
        return redirect('fees-list')->with('success','Fees Added Successfully');
    }
}
