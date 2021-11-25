<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ord_id')->references('id')->on('ordonnances')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('medic_id')->references('id')->on('medicaments')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('medords');
    }
}
