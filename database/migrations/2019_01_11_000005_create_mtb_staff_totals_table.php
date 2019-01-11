<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMtbStaffTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_staff_totals', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value');
            $table->text('rank');
        });

        $staff_totals=array(

         array('1~25','小'),
         array('25~50','小'),
         array('50~100','小'),
         array('100~150','小'),
         array('150~250','中'),
         array('250~400','中'),
         array('400~600','中'),
         array('600~800','中'),
         array('800~1000','中'),
         array('1000~2000','大'),
         array('2000以上','大')



        );
      foreach($staff_totals as $staff_total){

        DB::table('mtb_staff_totals')
            ->insert([

              'value'=>$staff_total[0],
              'rank'=>$staff_total[1],

            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtb_staff_totals');
    }
}
