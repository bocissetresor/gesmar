<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnacementSodecisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnacement_sodecis', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('date_ordonnacement');
            $table->integer('somme_ordonnacement');
            $table->string('commentaire')->nullable();
            $table->boolean('statut')->nullable();
            $table->unsignedBigInteger('compteur_sodeci_id');
            $table->foreign('compteur_sodeci_id')->references('id')->on('compteur_sodecis')->onDelete('cascade');
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
        Schema::dropIfExists('ordonnacement_sodecis');
    }
}
