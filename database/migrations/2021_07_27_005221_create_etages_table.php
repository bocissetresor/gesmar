<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etages', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('designation');
            $table->unsignedBigInteger('batiment_id');
            $table->foreign('batiment_id')->references('id')->on('batiments')->onDelete('cascade');
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
        Schema::dropIfExists('etages');
    }
}
