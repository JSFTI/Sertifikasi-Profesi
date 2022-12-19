<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_schedules', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned();
            $table->timestamp('start')->useCurrent();
            $table->timestamp('end')->useCurrent();

            $table->foreign('event_id')->references('id')->on('events')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_schedules');
    }
};
