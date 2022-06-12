<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('hora_de_entrada')->nullable();
            $table->timestamp('hora_de_salida')->nullable();
            $table->foreignId('persona_id')->constrained();
            $table->unsignedBigInteger('token_entrada');
            $table->unsignedBigInteger('token_salida');
            $table->foreign('token_entrada')->references('id')->on('tokens');
            $table->foreign('token_salida')->references('id')->on('tokens');
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
        //
    }
};
