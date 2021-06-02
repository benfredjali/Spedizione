<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpedizionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spediziones', function (Blueprint $table) {
            $table->id();
            $table->integer('senderCustomerCode');
            $table->integer('numericSenderReference');
            $table->string('alphanumericSenderReference');
            $table->string('parcelID');
            $table->string('etichetta');
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
        Schema::dropIfExists('spediziones');
    }
}
