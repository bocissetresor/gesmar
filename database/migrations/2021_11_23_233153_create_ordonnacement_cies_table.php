<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnacementCiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnacement_cies', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('date_ordonnacement');
            $table->integer('somme_ordonnacement');
            $table->string('commentaire')->nullable();
            $table->boolean('statut')->nullable();
            $table->unsignedBigInteger('compteur_cie_id');
            $table->foreign('compteur_cie_id')->references('id')->on('compteur_cies')->onDelete('cascade');
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
        Schema::dropIfExists('ordonnacement_cies');
    }
}
