<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnacements', function (Blueprint $table) {
            $table->id();
            $table->date('date_ordonnacement');
            $table->integer('somme_ordonnacement');
            $table->string('commentaire')->nullable();
            $table->boolean('statut')->nullable();
            $table->unsignedBigInteger('contrat_id');
            $table->foreign('contrat_id')->references('id')->on('contrats')->onDelete('cascade');
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
        Schema::dropIfExists('ordonnacements');
    }
}
