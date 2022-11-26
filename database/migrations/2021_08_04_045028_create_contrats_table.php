<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('date_debut');
            $table->string('type');

            $table->unsignedBigInteger('locataire_id');
            $table->foreign('locataire_id')->references('id')->on('locataires')->onDelete('cascade');

            $table->string('code_locataire');
            $table->string('nom_locataire');
            $table->string('adresse_postale');

            $table->boolean('statut_buro1')->default(0);
            $table->boolean('statut_buro2')->default(0);
            $table->boolean('statut_buro3')->default(0);

            $table->boolean('statut_ordonnacement')->default(0);

            //$table->string('ordonnancement')->default(0);
            $table->integer('som_cie')->default(0);
            $table->integer('som_sie')->default(0);
            $table->integer('som_gaz')->default(0);
            $table->integer('som_equipement')->default(0);
            $table->integer('som_toto')->default(0);

            $table->integer('som_payer_ouverture')->default(0);
            $table->integer('som_restant_ouverture')->default(0);
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
        Schema::dropIfExists('contrats');
    }
}
