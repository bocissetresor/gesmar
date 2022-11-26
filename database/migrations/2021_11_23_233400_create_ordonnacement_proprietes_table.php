<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnacementProprietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnacement_proprietes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('date_ordonnacement');
            $table->integer('somme_ordonnacement');
            $table->string('commentaire')->nullable();
            $table->boolean('statut')->nullable();
            $table->unsignedBigInteger('propriete_id');
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
        Schema::dropIfExists('ordonnacement_proprietes');
    }
}
