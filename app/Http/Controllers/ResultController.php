<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use PDF;
class ResultController extends Controller
{
    public function marks_entry(){
        return view('marks-entry');
    }
    public function result_indiv(){
        return view('result-indiv');
    }
    public function findindividualresult(Request $request){
        $reg = $request->reg;
        $result = Result::where('reg', $reg)->first();
        $pdf = PDF::loadView('result-indiv-pdf', [
            'result'=>$result,
            'isRemoteEnabled' => true,
        ])->setOptions(['defaultFont' => 'sans-serif']);
       
      // download PDF file with download method
       return $pdf->stream();
    }
}
