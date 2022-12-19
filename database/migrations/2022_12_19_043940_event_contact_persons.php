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
        Schema::create('event_contact_persons', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned();
            $table->string('name');

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
        Schema::dropIfExists('event_contact_persons');
    }
};
