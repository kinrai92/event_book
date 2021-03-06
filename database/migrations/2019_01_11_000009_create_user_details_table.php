<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger("user_id");
          $table->foreign('user_id')->references('id')->on('users');
          $table->text('lastname');
          $table->text('firstname');
          $table->text('lastname_reading');
          $table->text('firstname_reading');
          $table->unsignedInteger('mtb_area_id');
          $table->foreign('mtb_area_id')->references('id')->on('mtb_areas');
          $table->text('address');
          $table->string('phone_no');
          $table->integer('gender_flg');
          $table->date('birthday');
          $table->string('nickname');
          $table->softDeletes();
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
        Schema::dropIfExists('user_details');
    }
}
