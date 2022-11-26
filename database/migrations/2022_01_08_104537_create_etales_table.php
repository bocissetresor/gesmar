<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etales', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('designation')->nullable();
            $table->string('superficie')->nullable();
            $table->integer('pass')->nullable();
            $table->boolean('statut')->default(False)->nullable();
            $table->unsignedBigInteger('commerciaux_id');
            $table->foreign('commerciaux_id')->references('id')->on('commerciauxes')->onDelete('cascade');
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
        Schema::dropIfExists('etales');
    }
}
