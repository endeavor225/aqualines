<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NomGare');
            $table->string('ResponsableGare');
            $table->string('NumeroGare');
            $table->string('AdresseGare');
            $table->string('TelephoneGare');
            $table->string('Couleur')->unique();
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
        Schema::dropIfExists('gares');
    }
}
