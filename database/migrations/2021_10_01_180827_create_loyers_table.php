<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loyers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->date('date_payement')->nullable();
            $table->integer('loyer_somme_payer')->nullable();
            $table->integer('somme_restant')->nullable();
            $table->date('mois_payer')->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('banque')->nullable();
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
        Schema::dropIfExists('loyers');
    }
}
