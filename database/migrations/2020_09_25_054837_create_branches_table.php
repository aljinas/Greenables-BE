<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('branches', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email');
      $table->integer('branch_type_id');
      $table->string('contact_number');
      $table->string('location');
      $table->string('pincode');
      $table->string('address');
      $table->smallInteger('status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('branches');
  }
}
