<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbMunicipalitiesTable extends Migration
{
  private $prefectures = array(
      array(
        'id' => '1',
        'value' => '千代田区',
        'rank' => '1',
      ),
      array(
        'id' => '2',
        'value' => '中央区',
        'rank' => '2',
      ),
      array(
        'id' => '3',
        'value' => '港区',
        'rank' => '3',
      ),
      array(
        'id' => '4',
        'value' => '新宿区',
        'rank' => '4',
      ),
      array(
        'id' => '5',
        'value' => '文京区',
        'rank' => '5',
      ),
      array(
        'id' => '6',
        'value' => '台東区',
        'rank' => '6',
      ),
      array(
        'id' => '7',
        'value' => '墨田区',
        'rank' => '7',
      ),
      array(
        'id' => '8',
        'value' => '江東区',
        'rank' => '8',
      ),
      array(
        'id' => '9',
        'value' => '品川区',
        'rank' => '9',
      ),
      array(
        'id' => '10',
        'value' => '目黒区',
        'rank' => '10',
      ),
      array(
        'id' => '11',
        'value' => '大田区',
        'rank' => '11',
      ),
      array(
        'id' => '12',
        'value' => '世田谷区',
        'rank' => '12',
      ),
      array(
        'id' => '13',
        'value' => '渋谷区',
        'rank' => '13',
      ),
      array(
        'id' => '14',
        'value' => '中野区',
        'rank' => '14',
      ),
      array(
        'id' => '15',
        'value' => '杉並区',
        'rank' => '15',
      ),
      array(
        'id' => '16',
        'value' => '豊島区',
        'rank' => '16',
      ),
      array(
        'id' => '17',
        'value' => '北区',
        'rank' => '17',
      ),
      array(
        'id' => '18',
        'value' => '荒川区',
        'rank' => '18',
      ),
      array(
        'id' => '19',
        'value' => '板橋区',
        'rank' => '19',
      ),
      array(
        'id' => '20',
        'value' => '練馬区',
        'rank' => '20',
      ),
      array(
        'id' => '21',
        'value' => '足立区',
        'rank' => '21',
      ),
      array(
        'id' => '22',
        'value' => '葛飾区',
        'rank' => '22',
      ),
      array(
        'id' => '23',
        'value' => '江戸川区',
        'rank' => '23',
      ),
      array(
        'id' => '24',
        'value' => '八王子市',
        'rank' => '24',
      ),
      array(
        'id' => '25',
        'value' => '立川市',
        'rank' => '25',
      ),
      array(
        'id' => '26',
        'value' => '武蔵野市',
        'rank' => '26',
      ),
      array(
        'id' => '27',
        'value' => '三鷹市',
        'rank' => '27',
      ),
      array(
        'id' => '28',
        'value' => '青梅市',
        'rank' => '28',
      ),
      array(
        'id' => '29',
        'value' => '府中市',
        'rank' => '29',
      ),
      array(
        'id' => '30',
        'value' => '昭島市',
        'rank' => '30',
      ),
      array(
        'id' => '31',
        'value' => '調布市',
        'rank' => '31',
      ),
      array(
        'id' => '32',
        'value' => '町田市',
        'rank' => '32',
      ),
      array(
        'id' => '33',
        'value' => '小金井市',
        'rank' => '33',
      ),
      array(
        'id' => '34',
        'value' => '小平市',
        'rank' => '34',
      ),
      array(
        'id' => '35',
        'value' => '日野市',
        'rank' => '35',
      ),
      array(
        'id' => '36',
        'value' => '東村山市',
        'rank' => '36',
      ),
      array(
        'id' => '37',
        'value' => '国分寺市',
        'rank' => '37',
      ),
      array(
        'id' => '38',
        'value' => '国立市',
        'rank' => '38',
      ),
      array(
        'id' => '39',
        'value' => '福生市',
        'rank' => '39',
      ),
      array(
        'id' => '40',
        'value' => '狛江市',
        'rank' => '40',
      ),
      array(
        'id' => '41',
        'value' => '東大和市',
        'rank' => '41',
      ),
      array(
        'id' => '42',
        'value' => '清瀬市',
        'rank' => '42',
      ),
      array(
        'id' => '43',
        'value' => '東久留米市',
        'rank' => '43',
      ),
      array(
        'id' => '44',
        'value' => '武蔵村山市',
        'rank' => '44',
      ),
      array(
        'id' => '45',
        'value' => '多摩市',
        'rank' => '45',
      ),
      array(
        'id' => '46',
        'value' => '稲城市',
        'rank' => '46',
      ),
      array(
        'id' => '47',
        'value' => '羽村市',
        'rank' => '47',
      ),
      array(
        'id' => '48',
        'value' => 'あきる野市',
        'rank' => '48',
      ),
      array(
        'id' => '49',
        'value' => '西東京市',
        'rank' => '49',
      ),
      array(
        'id' => '50',
        'value' => '瑞穂町',
        'rank' => '50',
      ),
      array(
        'id' => '51',
        'value' => '日の出町',
        'rank' => '51',
      ),
      array(
        'id' => '52',
        'value' => '檜原村',
        'rank' => '52',
      ),
      array(
        'id' => '53',
        'value' => '奥多摩町',
        'rank' => '53',
      ),
      array(
        'id' => '54',
        'value' => '大島町',
        'rank' => '54',
      ),
      array(
        'id' => '55',
        'value' => '利島村',
        'rank' => '55',
      ),
      array(
        'id' => '56',
        'value' => '新島村',
        'rank' => '56',
      ),
      array(
        'id' => '57',
        'value' => '神津島村',
        'rank' => '57',
      ),
      array(
        'id' => '58',
        'value' => '三宅村',
        'rank' => '58',
      ),
      array(
        'id' => '59',
        'value' => '御蔵島村 ',
        'rank' => '59',
      ),
      array(
        'id' => '60',
        'value' => '八丈町',
        'rank' => '60',
      ),
      array(
        'id' => '61',
        'value' => '青ヶ島村',
        'rank' => '61',
      ),
      array(
        'id' => '62',
        'value' => '小笠原村',
        'rank' => '62',
      ),
    );
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_municipalities', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value');
            $table->integer('rank');

        });
        DB::table('mtb_municipalities')->insert(
            $this->prefectures
        );
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtb_municipalities');
    }
}
