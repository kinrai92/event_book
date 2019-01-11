<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbEventStatusesTable extends Migration
{
  private $prefectures = array(
      array(
        'id' => '1',
        'value' => '未公開',
        'rank' => '1',
      ),
      array(
        'id' => '2',
        'value' => '公開済み',
        'rank' => '2',
      ),
      array(
        'id' => '3',
        'value' => 'キャンセル済',
        'rank' => '3',
      ),
    );
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_event_statuses', function (Blueprint $table) {
          $table->increments('id');
          $table->text('value');
          $table->integer('rank');
        });
        DB::table('mtb_event_statuses')->insert(
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
        Schema::dropIfExists('mtb_event_statuses');
    }
}
