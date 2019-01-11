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
            $table->string('mail', 100)->unique();
            $table->text('password');

            $table->unsignedInteger('mtb_user_status_id');
            $table->string('token', 20)->unique();

            $table->text('lastname')->nullable();
            $table->text('firstname')->nullable();
            $table->text('lastname_reading')->nullable();
            $table->text('firstname_reading')->nullable();
            $table->unsignedInteger('mtb_area_id')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_no', 11)->unique()->nullable();
            $table->integer('gender_flg')->default('1')->comment('1:MALE 2:FEMALE')->nullable();
            $table->date('birthday')->nullable();
            $table->string('nickname', 40)->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mtb_area_id')->references('id')->on('mtb_areas');
            $table->foreign('mtb_user_status_id')->references('id')->on('mtb_user_statuses');
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
