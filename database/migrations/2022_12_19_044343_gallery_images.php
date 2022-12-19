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
        Schema::create('gallery_images', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('gallery_id')->unsigned();
            $table->string('filename');
            $table->string('caption')->nullable();
            $table->string('url');

            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_images');
    }
};
