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
        Schema::create('childtitles', function (Blueprint $table) {
            $table->id();
            $table->string('childTitle')->nullable();
            $table->unsignedBigInteger('subTitleID')->nullable();

            // foreign keys
            $table->foreign('subTitleID')->references('id')->on('subtitles');
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
        Schema::dropIfExists('childtitles');
    }
};
