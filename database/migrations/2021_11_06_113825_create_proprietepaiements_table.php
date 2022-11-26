<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietepaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietepaiements', function (Blueprint $table) {
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
        Schema::dropIfExists('proprietepaiements');
    }
}
