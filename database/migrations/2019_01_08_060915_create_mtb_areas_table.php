<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_areas', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('my_id');
=======
            $table->increments('mtb_area_id');
>>>>>>> c9c7a2f51fa1f24ebd93da6e353630640a4d57bf
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
        Schema::dropIfExists('mtb_areas');
    }
}
