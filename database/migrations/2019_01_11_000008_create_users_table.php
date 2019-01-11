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
<<<<<<< HEAD:database/migrations/2019_01_08_074707_create_users_table.php

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
=======
            $table->string("token", 20)->unique();
            $table->unsignedInteger("mtb_user_status_id");
            $table->foreign('mtb_user_status_id')->references('id')->on('mtb_user_statuses');
>>>>>>> d966c3020907128114c70e7ca38a2e6756d2ebc8:database/migrations/2019_01_11_000008_create_users_table.php
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
        Schema::dropIfExists('users');
    }
}
