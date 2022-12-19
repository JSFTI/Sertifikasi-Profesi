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
        Schema::create('gallery_image', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('gallery_id')->unsigned();
            $table->bigInteger('image_id')->unsigned();

            $table->foreign('gallery_id')->references('id')->on('galleries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('image_id')->references('id')->on('images')->cascadeOnDelete()->cascadeOnUpdate();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galery_image');
    }
};