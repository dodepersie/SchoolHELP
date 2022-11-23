<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Offer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('offer', function (Blueprint $table) {
        $table->increments('id_offer');
        $table->integer('id_request');
        $table->integer('id_user');
        $table->text('ofr_remarks');
        $table->enum('ofr_status', ['pending', 'accepted'])->default('pending');
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
      Schema::dropIfExists('offer');
    }
}
