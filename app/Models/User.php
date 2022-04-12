<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
  use HasFactory,HasApiTokens, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'username','email', 'user_type_id', 'branch_id', 'password', 'status'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * Get the employee record associated with the user.
  */
  public function employee() {
    return $this->hasOne('App\Models\Employee');
  }
  public function setEmailAttribute($value){
    $this->attributes['email'] = strtolower($value);
  }
  public function setPasswordAttribute($value){
    $this->attributes['password'] = Hash::make($value);
  }
}
