<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CodeVoyage')->unique();
            $table->string('PassageInitial')->nullable();
            $table->integer('MontantVoyage');
            $table->unsignedInteger('bateau_id')->index();
            $table->unsignedInteger('gare_id')->index();
            $table->string('NombrePassage')->nullable();
            $table->string('Depart');
            $table->string('Destination');
            $table->boolean('Statut')->nullable();
            $table->Integer('terminal1');
            $table->Integer('terminal2')->nullable();
            $table->timestamps();

            $table->foreign('bateau_id')->references('id')->on('bateaus');
            $table->foreign('gare_id')->references('id')->on('gares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voyages');
    }
}
