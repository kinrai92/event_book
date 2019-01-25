<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cooperation_id');
            $table->foreign('cooperation_id')->references('id')->on('cooperations');

            $table->unsignedInteger('mtb_municipality_id');
            $table->foreign('mtb_municipality_id')->references('id')->on('mtb_municipalities');

            $table->unsignedInteger('mtb_event_status_id');
            $table->foreign('mtb_event_status_id')->references('id')->on('mtb_event_statuses');

            $table->string('title', 80);
            $table->datatime('start_at');
            $table->integer('maximum');
            $table->integer('minimum');
            $table->integer('cost');
            $table->text('detail');
            $table->text('picture1');
            $table->text('picture2')->nullable();
            $table->text('picture3')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
