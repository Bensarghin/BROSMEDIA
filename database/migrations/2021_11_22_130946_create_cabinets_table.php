<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();
            $table->string('nom_cabenit');
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->string('tele');
            $table->string('adresse');
            $table->string('ville');
            $table->string('services_titre');
            $table->time('heure_ouver');
            $table->time('heure_ferme');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabinets');
    }
}