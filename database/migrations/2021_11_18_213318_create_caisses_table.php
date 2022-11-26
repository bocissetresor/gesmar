<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->integer('somme_total_paiement_effectuer')->nullable();
            $table->integer('somme_ouverture')->nullable();
            $table->integer('somme_fermeture')->nullable();
            $table->string('date_heure_ouverture')->nullable();
            $table->string('date_heure_fermeture')->nullable();
            $table->date('date_payement')->nullable();
            $table->integer('somme_payer')->nullable();
            $table->string('motif')->nullable();
            $table->string('commenteur')->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('banque')->nullable();
            $table->boolean('statut')->default(0);
            $table->unsignedBigInteger('loyer_id')->nullable();
            $table->foreign('loyer_id')->references('id')->on('loyers')->onDelete('cascade');
            $table->unsignedBigInteger('ciepaiement_id')->nullable();
            $table->foreign('ciepaiement_id')->references('id')->on('ciepaiements')->onDelete('cascade');
            $table->unsignedBigInteger('sodecipaiement_id')->nullable();
            $table->foreign('sodecipaiement_id')->references('id')->on('sodecipaiements')->onDelete('cascade');
            $table->unsignedBigInteger('gazpaiement_id')->nullable();
            $table->foreign('gazpaiement_id')->references('id')->on('gazpaiements')->onDelete('cascade');
            $table->unsignedBigInteger('proprietepaiement_id')->nullable();
            $table->foreign('proprietepaiement_id')->references('id')->on('proprietepaiements')->onDelete('cascade');
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
        Schema::dropIfExists('caisses');
    }
}
