<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail',100)->unique();
            $table->text('password');
            $table->string('name',100)->unique();
            $table->text('reading');
            $table->unsignedInteger('mtb_area_id');
            $table->text('address');
            $table->date('established_at');
            $table->unsignedInteger('mtb_staff_total_id');
            $table->unsignedInteger('mtb_industry_type_id');
            $table->text('business');
            $table->text('representative_name');
            $table->text('rn_reading');
            $table->string('tel_number',11)->unique();
            $table->string('fax_number',11);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mtb_area_id')->references('id')->on('mtb_areas');
            $table->foreign('mtb_staff_total_id')->references('id')->on('mtb_staff_totals');
            $table->foreign('mtb_industry_type_id')->references('id')->on('mtb_industry_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperations');
    }
}
