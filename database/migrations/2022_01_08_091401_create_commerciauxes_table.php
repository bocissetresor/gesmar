<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommerciauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerciauxes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nom')->nullable();
            $table->string('denomination')->nullable();
            $table->string('type')->nullable();
            $table->string('adresse_postale')->nullable();
            $table->string('ville')->nullable();
            $table->string('tel')->nullable();
            $table->string('statut')->nullable();
            $table->integer('encaissement')->nullable();
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
        Schema::dropIfExists('commerciauxes');
    }
}
