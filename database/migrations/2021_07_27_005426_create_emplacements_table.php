<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplacements', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('designation')->nullable();
            $table->string('superficie')->nullable();
            $table->integer('loyer')->nullable();
            $table->integer('pas_porte')->nullable();
            $table->boolean('statut')->default(False)->nullable();
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->string('type_emplacement')->nullable();
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
        Schema::dropIfExists('emplacements');
    }
}
