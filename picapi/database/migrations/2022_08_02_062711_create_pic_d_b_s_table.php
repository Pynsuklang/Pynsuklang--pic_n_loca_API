<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicDBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_d_b_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid')->nullable();
            $table->foreign('userid')->references('id')->on('manage_users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('latitude_data')->nullable();
            $table->string('longitude_data')->nullable();
            $table->string('file_location')->nullable();
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
        Schema::dropIfExists('pic_d_b_s');
    }
}
