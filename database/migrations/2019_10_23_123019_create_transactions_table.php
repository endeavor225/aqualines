<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DebitTransaction');
            $table->string('CreditTransaction');
            $table->unsignedInteger('carte_id')->index();
            $table->unsignedInteger('telephone_id')->index()->nullable();
            $table->unsignedInteger('gare_id')->index();
            $table->timestamps();

            $table->foreign('carte_id')->references('id')->on('cartes');
            $table->foreign('telephone_id')->references('id')->on('telephones');
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
        Schema::dropIfExists('transactions');
    }
}
