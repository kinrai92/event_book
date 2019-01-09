<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('mail',100)->unique();
            $table->text('password');
            $table->text('lastname');
            $table->text('firstname');
            $table->text('lastname_reading');
            $table->text('firstname_reading');
            $table->unsignedInteger('mtb_area_id');
            $table->text('address');
            $table->string('phone_no',11)->unique();
            $table->integer('gender_flg')->default('1')->comment('1:MALE 2:FEMALE');
            $table->date('birthday');
            $table->string('nickname',100)->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mtb_area_id')->references('id')->on('mtb_areas');
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
