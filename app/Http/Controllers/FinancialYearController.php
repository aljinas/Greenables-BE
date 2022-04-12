<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\FinancialYear;
use Validator;

class FinancialYearController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['financial_years'] = FinancialYear::all();
    $data['status'] = 200; 
    return response()->json($data, 200); 
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'code' => 'required',  
      'start_date' => 'required',  
      'end_date' => 'required'
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()], 401);            
    }
    $financialyear = FinancialYear::create([
      'name' => $request->name,
      'code' => $request->code,
      'start_date' => $request->start_date,
      'end_date' => $request->end_date,
      'status' => 0,
    ]);
    $data['status'] = 200; 
    $data['message'] =  "Successfully Created";
    return response()->json($data, 200); 
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\FinancialYear  $financialyear
   * @return \Illuminate\Http\Response
   */
  public function show(FinancialYear $financialyear)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\FinancialYear  $financialyear
   * @return \Illuminate\Http\Response
   */
  public function edit(FinancialYear $financialyear)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\FinancialYear  $financialyear
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, FinancialYear $financialyear)
  {
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'code' => 'required',  
      'start_date' => 'required',  
      'end_date' => 'required'
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()], 401);            
    }
    $financialyear = FinancialYear::find($financialyear->id);
    $financialyear->name = $request->name;
    $financialyear->code = $request->code;
    $financialyear->start_date = $request->start_date;
    $financialyear->end_date = $request->end_date;
    $financialyear->save();
    $data['status'] = 200; 
    $data['message'] =  "Successfully Updated";
    return response()->json($data, 200); 
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\FinancialYear  $financialyear
   * @return \Illuminate\Http\Response
   */
  public function destroy(FinancialYear $financialyear)
  {
    FinancialYear::find($financialyear->id)->delete();
    $data['status'] = 200; 
    $data['message'] =  "Successfully Deleted";
    return response()->json($data, 200); 
  }
}
