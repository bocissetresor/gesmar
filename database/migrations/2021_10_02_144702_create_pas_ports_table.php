<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasPortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pas_ports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrat_id');
            $table->foreign('contrat_id')->references('id')->on('contrats')->onDelete('cascade');
            $table->date('date_payement')->nullable();
            $table->string('code')->nullable();
            $table->integer('pas_port_somme_payer')->default(0);
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
        Schema::dropIfExists('pas_ports');
    }
}
