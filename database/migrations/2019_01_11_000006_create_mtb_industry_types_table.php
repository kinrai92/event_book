<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


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

        });

        $industry_types=array(

          array('IT・通信',1),
          array('インターネット・広告・メディア',2),
          array('メーカー(機械・電気)',3),
          array('メーカー(素材・化学・食品・化粧品・その他)',4),
          array('商社',5),
          array('医薬品・医療機器・医療系サービス',6),
          array('金融',7),
          array('建設・不動産',8),
          array('コンサルティング・専門事務所',9),
          array('人材サービス・アウトソーシング',10),
          array('小売',11),
          array('外食',12),
          array('旅行・宿泊・レジャー',13),
          array('理容・美容・エステ',14),
          array('教育・学習支援',15),
          array('冠婚葬祭',16),
          array('その他',17)
        );

        foreach($industry_types as $industry_type){

          DB::table('mtb_industry_types')
              ->insert([

                'value'=>$industry_type[0],
                'rank'=>$industry_type[1]
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
