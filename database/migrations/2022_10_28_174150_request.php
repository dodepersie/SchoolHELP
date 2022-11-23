<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Request extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('request', function (Blueprint $table) {
        $table->increments('id_request');
        $table->integer('id_school');
        $table->integer('id_user');
        $table->text('req_description');
        $table->dateTime('req_proposed_datetime')->nullable();
        $table->string('req_student_level')->nullable();
        $table->integer('req_no_of_student')->nullable();
        $table->enum('req_resource_type', ['mobile_device', 'personal_computer','networking_equipment'])->nullable();
        $table->integer('req_no_of_resource')->nullable();
        $table->enum('req_type', ['tutorial', 'resource']);
        $table->enum('req_status', ['new', 'closed'])->default('new');
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
      Schema::dropIfExists('request');
    }
}
