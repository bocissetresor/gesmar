<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteurSodeciContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteur_sodeci_contrat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrat_id')->nullable();
            $table->unsignedBigInteger('compteur_sodeci_id')->nullable();
            $table->foreign('contrat_id')->references('id')->on('contrats')->onDelete('cascade');
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
        Schema::dropIfExists('compteur_sodeci_contrat');
    }
}
