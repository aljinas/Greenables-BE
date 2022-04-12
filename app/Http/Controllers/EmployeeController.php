<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

use App\Models\User;
use App\Models\Employee; 
use Validator;

class EmployeeController extends Controller
{
  /** 
  * login api 
  */ 
  public function login(){ 
    if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){ 
      $user = Auth::user(); 
      $data['token'] =  $user->createToken('myAuth')-> accessToken;
      $data['user_type_id'] =  $user->user_type_id;
      $data['status'] =  200;
      // return response()->json(['data' => $data], 200);
      return response()->json($data, 200); 
    } 
    else{ 
      return response()->json(['error'=>'Unauthorized'], 401); 
    } 
  }
  /**
  * Register api 
  */ 
  public function register(Request $request) 
  { 
    $validator = Validator::make($request->all(), [ 
      'name' => 'required', 
      'username' => 'required', 
      'password' => 'required', 
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()], 401);            
    }
    $user = User::create([
      'name' => $request->name,
      'username' => $request->username,
      'user_type_id' => $request->user_type_id,
      'branch_id' => $request->branch_id,
      'password' => bcrypt($request->password), 
    ]);
    $employee = Employee::create([
      'user_id' => $user->id,
      'email' => $request->email,
      'contact_number' => $request->contact_number,
      'address' => $request->address,
      'pincode' => $request->pincode,
      'location' => $request->location,
    ]);
    $data['status'] = 200; 
    $data['message'] =  "Successfully Created";
    return response()->json($data, 200); 
  }
  /** 
  * list employees
  */ 
  public function getEmployees(){ 
    $user = Auth::user();
    if ($user->user_type_id == 1) {
      $data['employees'] = User::with('Employee')->get();
      $data['status'] = 200; 
      return response()->json($data, 200); 
    } else {
      $data['message'] = "Unauthorized";
      $data['status'] = 403; 
      return response()->json($data, 200); 
    }
  }
}
