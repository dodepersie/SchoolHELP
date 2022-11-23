<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id_user');
      $table->integer('id_school')->nullable();
      $table->string('staff_id')->nullable();
      $table->string('full_name');
      $table->date('date_of_birth')->nullable();
      $table->string('occupation')->nullable();
      $table->string('position')->nullable();
      $table->string('phone_number');
      $table->string('email')->unique();
      $table->string('username')->unique();
      $table->string('password');
      $table->enum('role_user', ['super_admin','admin','volunteer']);
      $table->timestamp('email_verified_at')->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
