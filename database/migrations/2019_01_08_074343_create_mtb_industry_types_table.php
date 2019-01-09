<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreateMtbIndustryTypesTable extends Migration
{

   private  $industry_types = array(

      array(1, 'IT・通信', 1),
      array(2, 'インターネット・広告・メディア', 2),
      array(3, 'メーカー(機械・電気)', 3),
      array(4, 'メーカー(素材・化学・食品・化粧品・その他)', 4),
      array(5, '商社', 5),
      array(6, '医薬品・医療機器・医療系サービス', 6),
      array(7, '金融', 7),
      array(8, '建設・不動産', 8),
      array(9, 'コンサルティング・専門事務所', 9),
      array(10, '人材サービス・アウトソーシング', 10),
      array(11, '小売', 11),
      array(12, '外食', 12),
      array(13, '旅行・宿泊・レジャー', 13),
      array(14, '理容・美容・エステ', 14),
      array(15,'教育・学習支援', 15),
      array(16, '冠婚葬祭', 16),
      array(17, 'その他', 17)

  );

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

        });

        foreach($this->industry_types as $industry_type){

          DB::table('mtb_industry_types')
              ->insert([

                'id'=>$industry_type[0],
                'value'=>$industry_type[1],
                'rank'=>$industry_type[2]

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
        Schema::dropIfExists('mtb_industry_types');
    }
}
