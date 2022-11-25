<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batchs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NumeroCarte')->unique();
            $table->string('CLE')->unique();
            $table->string('NLot')->nullable();
            $table->string('Divers1')->nullable();
            $table->string('Divers2')->nullable();
            $table->string('Divers3')->nullable();
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
        Schema::dropIfExists('batchs');
    }
}
