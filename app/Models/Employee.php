<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  use HasFactory;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'email', 'contact_number', 'address', 'pincode', 'location'
  ];

  /**
  * Get the user that owns the employee.
  */
  public function user() {
    return $this->belongsTo('App\Models\User');
  }
}
