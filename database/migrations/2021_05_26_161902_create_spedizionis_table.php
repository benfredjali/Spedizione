<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpedizionisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spedizionis', function (Blueprint $table) {
            $table->id();
             $table->string('costumer');
            $table->string('adresse');
            $table->string('data_nascita');

            $table->string('spedizione_data');
            $table->string('servizio');
            $table->string('porto');
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
        Schema::dropIfExists('spedizionis');
    }
}
