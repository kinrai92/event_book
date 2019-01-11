<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbAreasTable extends Migration
{

    private $areas = [

      [
        'id' => '1',
        'value' => '北海道',
        'rank' => '1'
      ],

      [
        'id' => '2',
        'value' => '青森県',
        'rank' => '2'
      ],

      [
        'id' => '3',
        'value' => '岩手県',
        'rank' => '3'
      ],

      [
        'id' => '4',
        'value' => '宮城県',
        'rank' => '4'
      ],

      [
        'id' => '5',
        'value' => '秋田県',
        'rank' => '5'
      ],

      [
        'id' => '6',
        'value' => '山形県',
        'rank' => '6'
      ],

      [
        'id' => '7',
        'value' => '福島県',
        'rank' => '7'
      ],

      [
        'id' => '8',
        'value' => '茨城県',
        'rank' => '8'
      ],

      [
        'id' => '9',
        'value' => '栃木県',
        'rank' => '9'
      ],

      [
        'id' => '10',
        'value' => '群馬県',
        'rank' => '10'
      ],

      [
        'id' => '11',
        'value' => '埼玉県',
        'rank' => '11'
      ],

      [
        'id' => '12',
        'value' => '千葉県',
        'rank' => '12'
      ],

      [
        'id' => '13',
        'value' => '東京都',
        'rank' => '13'
      ],

      [
        'id' => '14',
        'value' => '神奈川県',
        'rank' => '14'
      ],

      [
        'id' => '15',
        'value' => '新潟県',
        'rank' => '15'
      ],

      [
        'id' => '16',
        'value' => '富山県',
        'rank' => '16'
      ],

      [
        'id' => '17',
        'value' => '石川県',
        'rank' => '17'
      ],

      [
        'id' => '18',
        'value' => '福井県',
        'rank' => '18'
      ],

      [
        'id' => '19',
        'value' => '山梨県',
        'rank' => '19'
      ],

      [
        'id' => '20',
        'value' => '長野県',
        'rank' => '20'
      ],

      [
        'id' => '21',
        'value' => '岐阜県',
        'rank' => '21'
      ],

      [
        'id' => '22',
        'value' => '静岡県',
        'rank' => '22'
      ],

      [
        'id' => '23',
        'value' => '愛知県',
        'rank' => '23'
      ],

      [
        'id' => '24',
        'value' => '三重県',
        'rank' => '24'
      ],

      [
        'id' => '25',
        'value' => '滋賀県',
        'rank' => '25'
      ],

      [
        'id' => '26',
        'value' => '京都府',
        'rank' => '26'
      ],

      [
        'id' => '27',
        'value' => '大阪府',
        'rank' => '27'
      ],

      [
        'id' => '28',
        'value' => '兵庫県',
        'rank' => '28'
      ],

      [
        'id' => '29',
        'value' => '奈良県',
        'rank' => '29'
      ],

      [
        'id' => '30',
        'value' => '和歌山県',
        'rank' => '30'
      ],

      [
        'id' => '31',
        'value' => '鳥取県',
        'rank' => '31'
      ],

      [
        'id' => '32',
        'value' => '島根県',
        'rank' => '32'
      ],

      [
        'id' => '33',
        'value' => '岡山県',
        'rank' => '33'
      ],

      [
        'id' => '34',
        'value' => '広島県',
        'rank' => '34'
      ],

      [
        'id' => '35',
        'value' => '山口県',
        'rank' => '35'
      ],

      [
        'id' => '36',
        'value' => '徳島県',
        'rank' => '36'
      ],

      [
        'id' => '37',
        'value' => '香川県',
        'rank' => '37'
      ],

      [
        'id' => '38',
        'value' => '愛媛県',
        'rank' => '38'
      ],

      [
        'id' => '39',
        'value' => '高知県',
        'rank' => '39'
      ],

      [
        'id' => '40',
        'value' => '福岡県',
        'rank' => '40'
      ],

      [
        'id' => '41',
        'value' => '佐賀県',
        'rank' => '41'
      ],

      [
        'id' => '42',
        'value' => '長崎県',
        'rank' => '42'
      ],

      [
        'id' => '43',
        'value' => '熊本県',
        'rank' => '43'
      ],

      [
        'id' => '44',
        'value' => '大分県',
        'rank' => '44'
      ],

      [
        'id' => '45',
        'value' => '宮崎県',
        'rank' => '45'
      ],

      [
        'id' => '46',
        'value' => '鹿児島県',
        'rank' => '46'
      ],

      [
        'id' => '47',
        'value' => '沖縄県',
        'rank' => '47'
      ],
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_areas', function (Blueprint $table) {

            $table->increments('id');
            $table->text('value');
            $table->integer('rank');

        });

        foreach ($this->areas as $record)
        {
          DB::table('mtb_areas')->insert($record);
        }

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
