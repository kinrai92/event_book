<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbUserStatusesTable extends Migration
{

  private $statuses = array(
      array(
        'id' => '1',
        'value' => 'メール未承認',
        'rank' => '1',
      ),
      array(
        'id' => '2',
        'value' => '詳細情報未入力',
        'rank' => '2',
      ),
      array(
        'id' => '3',
        'value' => '本会員',
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
        Schema::create('mtb_user_statuses', function (Blueprint $table) {
          $table->increments('id');
          $table->text('value');
          $table->integer('rank');
        });


        foreach ($this->statuses as $record)
        {
          DB::table('mtb_user_statuses')->insert($record);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtb_user_statuses');
    }
}
