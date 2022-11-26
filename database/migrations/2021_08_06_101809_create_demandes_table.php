<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('code');

            $table->unsignedBigInteger('locataire_id');
            $table->foreign('locataire_id')->references('id')->on('locataires')->onDelete('cascade');

            $table->unsignedBigInteger('emplacement_id');
            $table->foreign('emplacement_id')->references('id')->on('emplacements')->onDelete('cascade');

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
        Schema::dropIfExists('demandes');
    }
}
