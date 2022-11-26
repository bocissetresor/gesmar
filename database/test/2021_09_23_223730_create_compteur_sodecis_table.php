<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteurSodecisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteur_sodecis', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('denomination')->nullable();
            $table->integer('index_dbt')->nullable();
            $table->integer('index_fn')->nullable();
            $table->integer('som_total')->nullable();
            $table->string('adresse_gps')->nullable();
            $table->string('libelle')->nullable();
            $table->boolean('statut')->default(0);
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
        Schema::dropIfExists('compteur_sodecis');
    }
}
