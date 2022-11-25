<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Montant');
            $table->string('TypeRecharge');
            $table->unsignedInteger('carte_id')->index();
            $table->unsignedInteger('caisse_id')->index();
            $table->unsignedInteger('gare_id')->index();
            $table->timestamps();

            $table->foreign('carte_id')->references('id')->on('cartes');
            $table->foreign('caisse_id')->references('id')->on('caisses');
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
        Schema::dropIfExists('recharges');
    }
}
