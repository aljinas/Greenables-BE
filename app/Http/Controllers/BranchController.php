<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Branch;
use Validator;

class BranchController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['branches'] = Branch::all();
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
      'email' => 'required',  
      'contact_number' => 'required',  
      'location' => 'required', 
      'branch_type_id' => 'required',  
      'pincode' => 'required',  
      'address' => 'required', 
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()], 401);            
    }
    $branch = Branch::create([
      'name' => $request->name,
      'email' => $request->email,
      'contact_number' => $request->contact_number,
      'location' => $request->location,
      'branch_type_id' => $request->branch_type_id,
      'pincode' => $request->pincode,
      'address' => $request->address,
      'status' => 0,
    ]);
    $data['status'] = 200; 
    $data['message'] =  "Successfully Created";
    return response()->json($data, 200); 
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Branch  $branch
   * @return \Illuminate\Http\Response
   */
  public function show(Branch $branch)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Branch  $branch
   * @return \Illuminate\Http\Response
   */
  public function edit(Branch $branch)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Branch  $branch
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Branch $branch)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Branch  $branch
   * @return \Illuminate\Http\Response
   */
  public function destroy(Branch $branch)
  {
    Branch::find($branch->id)->delete();
    $data['status'] = 200; 
    $data['message'] =  "Successfully Deleted";
    return response()->json($data, 200); 
  }
}
