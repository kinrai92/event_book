<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbTicketStatusesTable extends Migration
{

    private $statuses = [
      [
        'id' => '1',
        'value' => '未使用',
        'rank' => '1',
      ],

      [
        'id' => '2',
        'value' => '使用済み',
        'rank' => '2',
      ],

      [
        'id' => '3',
        'value' => 'キャンセル済',
        'rank' => '3',
      ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtb_ticket_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value');
            $table->integer('rank');
        });

        foreach ($this->statuses as $record) {
          DB::table('mtb_ticket_statuses')->insert($record);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtb_ticket_statuses');
    }
}
