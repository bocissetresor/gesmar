<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('denomination')->nullable();
            $table->string('adresse_gps')->nullable();
            $table->integer('index_dbt')->nullable();
            $table->integer('index_fn')->nullable();
            $table->integer('som_total')->nullable();
            $table->integer('unite_index')->nullable();
            $table->integer('somme_restant')->nullable();
            $table->string('libelle')->nullable();
            $table->string('mois_payer')->nullable();
            $table->boolean('statut')->nullable();
            $table->boolean('statut_ordonnacement')->default(0);
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
        Schema::dropIfExists('proprietes');
    }
}
