<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBateausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bateaus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Matricule')->unique();
            $table->integer('Capacite');
            $table->string('Libelle');
            $table->integer('Poids');
            $table->string('Details');
            $table->string('Kilometrage');
            $table->unsignedInteger('gare_id')->index();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('bateaus');
    }
}
