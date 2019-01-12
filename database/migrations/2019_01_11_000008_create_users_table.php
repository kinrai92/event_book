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
<<<<<<< HEAD:database/migrations/2019_01_11_000008_create_users_table.php
            $table->string("token", 20)->unique();
            $table->unsignedInteger("mtb_user_status_id");
            $table->foreign('mtb_user_status_id')->references('id')->on('mtb_user_statuses');

            $table->softDeletes();
            $table->timestamps();

=======
            $table->unsignedInteger('mtb_user_status_id');
            $table->string('token',20)->unique();
            $table->text('lastname')->nullable();
            $table->text('firstname')->nullable();
            $table->text('lastname_reading')->nullable();
            $table->text('firstname_reading')->nullable();
            $table->unsignedInteger('mtb_area_id')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_no',11)->unique()->nullable();
            $table->integer('gender_flg')->default('1')->comment('1:MALE 2:FEMALE')->nullable();
            $table->date('birthday')->nullable();
            $table->string('nickname',40)->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mtb_area_id')->references('id')->on('mtb_areas');
            $table->foreign('mtb_user_status_id')->references('id')->on('mtb_user_statuses');
>>>>>>> fbd0712be3bcde095dcacc91d2547954b59b6817:database/migrations/2019_01_08_074707_create_users_table.php
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
