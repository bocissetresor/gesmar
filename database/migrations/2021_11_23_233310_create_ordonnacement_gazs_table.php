<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnacementGazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnacement_gazs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('date_ordonnacement');
            $table->integer('somme_ordonnacement');
            $table->string('commentaire')->nullable();
            $table->boolean('statut')->nullable();
            $table->unsignedBigInteger('gaz_id');
            $table->foreign('gaz_id')->references('id')->on('gazs')->onDelete('cascade');
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
        Schema::dropIfExists('ordonnacement_gazs');
    }
}
