<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatrdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('date_consu');
            $table->time('heure_rdv');
            $table->string('status');
            $table->foreignId('rdv_id')->references('id')->on('rdvs');
            $table->foreignId('med_id')->references('id')->on('medecins');
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
        Schema::dropIfExists('etat_rdvs');
    }
}
