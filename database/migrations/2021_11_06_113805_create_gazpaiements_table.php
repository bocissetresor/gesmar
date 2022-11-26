<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGazpaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gazpaiements', function (Blueprint $table) {
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
        Schema::dropIfExists('gazpaiements');
    }
}
