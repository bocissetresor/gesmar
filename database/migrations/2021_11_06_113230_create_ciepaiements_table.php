<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiepaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciepaiements', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('index_dbt')->nullable();
            $table->integer('index_fn')->nullable();
            $table->date('date_payement')->nullable();
            $table->integer('somme_payer')->nullable();
            $table->integer('somme_restant')->nullable();
            $table->date('mois_payer')->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('banque')->nullable();
            $table->string('code_locataire')->nullable();
            $table->string('code_contrat')->nullable();
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
        Schema::dropIfExists('ciepaiements');
    }
}
