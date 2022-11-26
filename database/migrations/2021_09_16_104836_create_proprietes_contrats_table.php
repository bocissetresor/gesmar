<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietesContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietes_contrats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrat_id');
            $table->unsignedBigInteger('propriete_id');
            $table->foreign('contrat_id')->references('id')->on('contrats')->onDelete('cascade');
            $table->foreign('propriete_id')->references('id')->on('proprietes')->onDelete('cascade');
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
        Schema::dropIfExists('proprietes_contrats');
    }
}
