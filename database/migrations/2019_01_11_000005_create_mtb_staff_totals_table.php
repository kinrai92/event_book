<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMtbStaffTotalsTable extends Migration
{

    private $staff_totals = array(

       array(1, '1~25', '小'),
       array(2, '25~50', '小'),
       array(3, '50~100', '小'),
       array(4, '100~150', '小'),
       array(5, '150~250', '中'),
       array(6, '250~400', '中'),
       array(7, '400~600', '中'),
       array(8, '600~800', '中'),
       array(9, '800~1000', '中'),
       array(10, '1000~2000', '大'),
       array(11, '2000以上', '大')

    );
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


      foreach($this->staff_totals as $staff_total){

        DB::table('mtb_staff_totals')
            ->insert([

              'id'=>$staff_total[0],
              'value'=>$staff_total[1],
              'rank'=>$staff_total[2]

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
