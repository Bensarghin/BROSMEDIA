<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {

            $table->id();
            $table->date('date_prend_rdv');
            $table->integer('pat_id')->unsigned();
            $table->foreign('pat_id')->references('id')->on('patients');
            $table->integer('act_id')->unsigned();
            $table->foreign('act_id')->references('id')->on('actes');
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
        Schema::dropIfExists('rdvs');
    }
}
