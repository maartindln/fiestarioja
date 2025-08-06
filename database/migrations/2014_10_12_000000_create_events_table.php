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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pueblo_id'); // clave foránea
            $table->string('name');
            $table->date('dateIni');
            $table->date('dateFin');
            $table->string('cartel');
            $table->string('puntos_interes');
            $table->timestamps();

            $table->foreign('pueblo_id')->references('id')->on('pueblos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
