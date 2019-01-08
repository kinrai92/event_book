<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> f416fdb8c27d25d701265a201cbb18994646602d

class CreateMtbIndustryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_industry_types', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value');
            $table->integer('rank');
<<<<<<< HEAD
            
        });
=======

        });

         $industrys=array(

           

         );

>>>>>>> f416fdb8c27d25d701265a201cbb18994646602d
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtb_industry_types');
    }
}
